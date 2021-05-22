<?php

namespace App\Services;

class MQMessage
{
    private $connection;
    private $channel;
    private $callbackQueue;
    private $response;

    // ID of this transaction
    private $transitId;

    

}
