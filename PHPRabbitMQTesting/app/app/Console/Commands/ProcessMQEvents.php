<?php

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

    public function handle() {
        $this->channel->basic_consume(
            'user.event.updated',
            '', false, true, false, false, function() {
                dump('called');
        });
    }

}
