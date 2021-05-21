<?php

namespace App\Services;

class RabbitMQService
{
    const EXCHANGE_TYPE_DIRECT = 'direct';
    const EXCHANGE_TYPE_FANOUT = 'fanout';
    const EXCHANGE_TYPE_TOPIC = 'topic';

    const EXCHANGE_NAME_CMD = 'orka.cmd';
    const EXCHANGE_NAME_EVENT = 'orka.event';

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
            ],
        ]);
    }

    protected function createMessageTopic(string $service, string $cmd): string {
        return $service . '.cmd.' . $cmd;
    }
}
