<?php

namespace App\Services;

class RabbitMQService
{
    public function __construct() {

    }

    // Send = Send and wait for a reply
    public function send(string $topic, $data) {
        app('amqp')->publish(json_encode(['message' => 'Hello']), 'env.user.sendMessage', [
            'exchange' => [
                'type'    => 'direct',
                'name'    => 'orka.requestreply',
                'declare' => true,
            ],
        ]);
    }
}
