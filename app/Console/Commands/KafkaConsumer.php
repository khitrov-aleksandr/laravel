<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;

class KafkaConsumer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:consumer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Kafka consumer';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info(config('kafka.brokers'));

        $consumer = Kafka::consumer()
            ->withBrokers('kafka:9092')
            ->withConsumerGroupId('test-laravel-group')
            ->subscribe('test-laravel-topic')
            ->withHandler(function (\Junges\Kafka\Contracts\ConsumerMessage $message, \Junges\Kafka\Contracts\MessageConsumer $consumer) {
                var_dump($message->getBody());
                \Log::info($message->getBody());
            })
            ->build();

        $consumer->consume();
    }
}
