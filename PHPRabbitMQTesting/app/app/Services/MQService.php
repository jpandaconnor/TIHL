<?php

namespace App\Services;

class MQService
{
    const EXCHANGE_TYPE_DIRECT = 'direct';
    const EXCHANGE_TYPE_FANOUT = 'fanout';
    const EXCHANGE_TYPE_TOPIC = 'topic';

    const EXCHANGE_NAME_CMD = 'orka.cmd';
    const EXCHANGE_NAME_EVENT = 'orka.event';

    public static function createMessageTopic(string $service, string $cmd): string {
        return $service . '.cmd.' . $cmd;
    }
}
