<?php

namespace App\Services;

class RabbitMQService
{
    protected $ampq;

    public function __construct() {
        $this->ampq = app('amqp');
    }

    // Send = Send and wait for a reply
    public function send(string $service, string $cmd, $data, $callback) {
        $topic = $this->createMessageTopic($service, $cmd);

        $this->ampq->publish(json_encode($data), $topic, [
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
