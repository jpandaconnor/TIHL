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

    /**
     *
     * Send a message to the exchange
     *
     * Creates the exchange if it doesn't already exists
     *
     * @param string $service
     * @param string $cmd
     * @param $data
     * @param null $callback
     * @throws \Exception
     */
    public function send(string $service, string $cmd, $data, $callback = null) {
        if(empty($service) || empty($cmd)) {
            throw new \Exception('Service and cmd cannot be empty or null');
        }

        $topic = $this->createMessageTopic($service, $cmd);

        $this->amqp->publish(json_encode($data), $topic, [
            'exchange' => [
                'type'    => self::EXCHANGE_TYPE_DIRECT,
                'name'    => self::EXCHANGE_NAME_CMD,
            ],
        ]);
    }

    protected function createMessageTopic(string $service, string $cmd): string {
        return $service . '.cmd.' . $cmd;
    }
}
