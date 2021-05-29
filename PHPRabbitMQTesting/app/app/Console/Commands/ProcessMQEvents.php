<?php

namespace App\Console\Commands;

use App\Services\MQService;
use Illuminate\Console\Command;

class ProcessMQEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process-mq-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listeners for events on RabbitMQ';

    protected $mqService;

    private $connection;
    private $channel;

    public function __construct()
    {
        $this->mqService = new MQService();

        $this->connection = $this->mqService->getMQConnection();
        $this->channel = $this->connection->channel();

        parent::__construct();
    }

/*$this->channel->basic_consume(
false,
array(
$this,
'onResponse'
)
);*/

    public function handle() {
        $queue = MQService::createEventConsumerQueueName('user', 'updated');

        $this->channel->queue_declare($queue, false, true, true, false);
        $this->channel->queue_bind(
            $queue,
            'orka.event',
            'user.event.updated',
            true,
        );

        $this->channel->basic_consume(
            $queue,
            '',
            false,
            true,
            false,
            false,
            function() {
                dump('called');
        });

        while ($this->channel->is_open()) {
            $this->channel->wait();
        }

        $this->channel->close();
        $this->connection->close();
    }

}
