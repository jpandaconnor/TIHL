<?php

namespace App\Services;

use PhpAmqpLib\Message\AMQPMessage;

class MQEvent
{
    protected $mqService;

    private $connection;
    private $channel;

    private $timeout = 5;

    public function __construct()
    {
        $this->mqService = new MQService();

        $this->connection = $this->mqService->getMQConnection();
        $this->channel = $this->connection->channel();
    }

    public function publish(string $service, string $topic, $data) {
        if(empty($service) || empty($topic)) {
            throw new \Exception('Service and/or cmd cannot be empty or null');
        }

        $message = new AMQPMessage(
            json_encode($data)
        );

        $this->channel->basic_publish($message,
            'orka.event',
            MQService::createEventTopic($service, $topic));

        $this->channel->close();
        $this->connection->close();

        return true;
    }
}
