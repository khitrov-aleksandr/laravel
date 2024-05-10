<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Junges\Kafka\Facades\Kafka;

class BrokerController extends Controller
{
    #[Get('broker')]
    public function broker()
    {
        \Log::info('TTT');

        $consumer = Kafka::consumer(brokers: 'kafka:9092')
            ->subscribe('test-laravel')
            ->stopAfterLastMessage()
            ->withHandler(function (\Junges\Kafka\Contracts\ConsumerMessage $message, \Junges\Kafka\Contracts\MessageConsumer $consumer) {
                var_dump($message);
                var_dump($consumer);
                \Log::info($message);
            })
            ->build();

        //$consumer->consume();

        return 'OK';
    }

    #[Get('broker/test')]
    public function test()
    {
        return config('broker.kafka.bootstrap_server');
    }
}
