<?php

namespace App\Services\Brokers\Kafka\Handlers;

use Junges\Kafka\Contracts\ConsumerMessage;
use Junges\Kafka\Contracts\Handler;

class ConsumerMessageHandler implements Handler
{
    public function __invoke(ConsumerMessage $message): void
    {
        dump($message);
    }
}
