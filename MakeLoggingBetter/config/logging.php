<?php


return [
    'default' => env('LOG_CHANNEL', 'fluent'),

    'channels' => [
        'fluent' => [
            'driver' => 'fluent',
            'level' => 'debug',
        ],
    ]
];
