<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class RabbitMQService
{
    const EXCHANGE_TYPE_DIRECT = 'direct';
    const EXCHANGE_TYPE_FANOUT = 'fanout';
    const EXCHANGE_TYPE_TOPIC = 'topic';

    const EXCHANGE_NAME_CMD = 'orka.cmd';
    const EXCHANGE_NAME_EVENT = 'orka.event';

    protected $connection;
    protected $channel;
    protected $callbackQueue;

    public function __construct() {
        $this->connection = new AMQPStreamConnection('rabbitmq', 5672, 'guest', 'guest');
        $this->channel = $this->connection->channel();

        list($this->callbackQueue, ,) = $this->channel->queue_declare(
            '',
            false,
            false,
            true,
            false
        );

        $this->channel->basic_consume(
            $this->callbackQueue,
            '',
            false,
            true,
            false,
            false,
            array(
                $this,
                'onResponse'
            )
        );

        dump($this->callbackQueue);

        dump($this->channel);
    }

    public function onResponse($rep)
    {
        if ($rep->get('correlation_id') == $this->corr_id) {
            $this->response = $rep->body;
        }
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

  /*      $r = $this->amqp->publish(json_encode($data), $topic, [
            'exchange' => [
                'type'    => self::EXCHANGE_TYPE_DIRECT,
                'name'    => self::EXCHANGE_NAME_CMD,
            ],
        ], function($t) {
            dump($t);
        });

        dump($r);*/
    }

    protected function createMessageTopic(string $service, string $cmd): string {
        return $service . '.cmd.' . $cmd;
    }
}
