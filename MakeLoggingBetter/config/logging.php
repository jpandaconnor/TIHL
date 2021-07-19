<?php


return [
    'default' => env('LOG_CHANNEL', 'logstash'),

    'channels' => [
        'logstash' => [
            'driver' => 'custom',
            'via'    => \App\Helpers\LogstashLogger::class,
            'host'   => env('LOGSTASH_HOST', '34.142.80.59'),
            'port'   => env('LOGSTASH_PORT', 4718),
        ],
    ]
];
