<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class MQMessage
{
    private $connection;
    private $channel;
    private $callbackQueue;
    private $response;

    private $timeout = 5;


    // ID of this transaction
    private $transitId;

    public function __construct()
    {
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
    }

    public function onResponse($rep)
    {
        if ($rep->get('correlation_id') == $this->transitId) {
            $this->response = $rep->body;
        }
    }

    public function setTimeout(int $timeout) {
        $this->timeout = $timeout;
    }

    public function send(string $service, string $cmd, $data, $callback = null) {
        if(empty($service) || empty($cmd)) {
            throw new \Exception('Service and cmd cannot be empty or null');
        }

        $this->response = null;
        $this->transitId = uniqid();

        $message = new AMQPMessage(
            json_encode($data),
            array(
                'correlation_id' => $this->transitId,
                'reply_to' => $this->callbackQueue,
            )
        );

        $this->channel->basic_publish($message,
            MQService::EXCHANGE_NAME_CMD,
            MQService::createMessageTopic($service, $cmd));

        while (!$this->response) {
            $this->channel->wait(null, false, $this->timeout);
        }

        $responseData = (object) json_decode($this->response, true);

        if(!$callback) {
            return $responseData;
        }

        return $callback($responseData);
    }
}
