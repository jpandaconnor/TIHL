<?php

class ProcessMQEvents extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process-mq-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Listeners for events on RabbitMQ';

    
}
