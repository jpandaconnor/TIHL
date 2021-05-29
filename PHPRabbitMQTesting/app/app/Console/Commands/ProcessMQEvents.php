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

    public function handle() {
        $messages = [
            [
                'service' => 'user',
                'topic' => 'updated',
                'callback' => function() {
                    dump("Callback for user updated called");
                }
            ],
            [
                'service' => 'user',
                'topic' => 'deleted',
                'callback' => function($data) {
                    dump($data);
                    dump("Callback for user deleted called");
                }
            ]
        ];

        foreach ($messages as $message) {
            $routingKey = MQService::createEventTopic($message['service'], $message['topic']);
            $queue = MQService::createEventConsumerQueueName($message['service'], $message['topic']);

            $this->channel->queue_declare($queue, false, true, false, true);
            $this->channel->queue_bind(
                $queue,
                MQService::EXCHANGE_NAME_EVENT,
                $routingKey,
                true,
            );

            $this->channel->basic_consume(
                $queue,
                '',
                false,
                true,
                false,
                false,
                $message['callback']
            );
        }

        while ($this->channel->is_open()) {
            $this->channel->wait();
        }

        $this->channel->close();
        $this->connection->close();
    }

}
