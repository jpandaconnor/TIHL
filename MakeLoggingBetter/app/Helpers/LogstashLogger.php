<?php

namespace App\Helpers;

use Monolog\Formatter\FluentdFormatter;
use Monolog\Handler\SocketHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;


class LogstashLogger
{
    public function __invoke(array $config): LoggerInterface
    {
        $handler = new SocketHandler("udp://{$config['host']}:{$config['port']}");
        $handler->setFormatter(new FluentdFormatter());
        return new Logger('fluentd.main', [$handler]);
    }
}
