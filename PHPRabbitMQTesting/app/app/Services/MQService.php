<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;

class MQService
{
    const EXCHANGE_TYPE_DIRECT = 'direct';
    const EXCHANGE_TYPE_FANOUT = 'fanout';
    const EXCHANGE_TYPE_TOPIC = 'topic';

    const EXCHANGE_NAME_CMD = 'orka.cmd';
    const EXCHANGE_NAME_EVENT = 'orka.event';

    public static function createMessagePattern(string $service, string $cmd): string {
        return $service . '.cmd.' . $cmd;
    }

    public static function createEventPattern(string $service, string $topic): string {
        return $service . '.event.' . $topic;
    }

    public static function createEventConsumerQueueName(string $service, string $topic): string {
        return 'ms.api;' . $service . '-' . $topic . '-queue';
    }

    public function getMQConnection() {
        return new AMQPStreamConnection(
            env('MQ.HOST', 'rabbitmq'),
            env('MQ.PORT', 5672),
            env('MQ.USER', 'guest'),
            env('MQ.PASSWORD', 'guest'));
    }
}
