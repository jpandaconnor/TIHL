<?php


return [
    'default' => env('LOG_CHANNEL', 'logstash'),

    'channels' => [
        'logstash' => [
            'driver' => 'custom',
            'via'    => \App\Helpers\LogstashLogger::class,
            'host'   => env('LOGSTASH_HOST', 'localhost'),
            'port'   => env('LOGSTASH_PORT', 24224),
        ],
    ]
];
