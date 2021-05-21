<?php

namespace App\Services;

class RabbitMQService
{
    protected $amqp;

    public function __construct() {
        $this->amqp = app('amqp');
    }

    // Send = Send and wait for a reply
    public function send(string $service, string $cmd, $data, $callback) {
        if(empty($service) || empty($cmd)) {
            throw new \Exception('Service and cmd cannot be empty or null');
        }

        $topic = $this->createMessageTopic($service, $cmd);

        $this->amqp->publish(json_encode($data), $topic, [
            'exchange' => [
                'type'    => 'direct',
                'name'    => 'orka.requestreply',
                'declare' => true,
            ],
        ]);
    }

    protected function createMessageTopic(string $service, string $cmd): string {
        return $service . '.cmd.' . $cmd;
    }
}
