<?php

namespace App\Helpers;

use Monolog\Formatter\LogstashFormatter;
use Monolog\Handler\SocketHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;


class LogstashLogger
{
    public function __invoke(array $config): LoggerInterface
    {
        $handler = new SocketHandler("tcp://{$config['host']}:{$config['port']}");
        $handler->setFormatter(new LogstashFormatter('testlog'));
        return new Logger('logstash.main', [$handler]);
    }
}
