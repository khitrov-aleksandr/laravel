<?php

namespace App\Console\Commands;

use App\Services\Brokers\Kafka\Handlers\ConsumerMessageHandler;
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
        $this->info('Start Kafka consumer...');

        $stopAfterLastMessage = false;

        Kafka::consumer()
            ->subscribe(config('kafka.default_topic'))
            ->stopAfterLastMessage($stopAfterLastMessage)
            ->withHandler(new ConsumerMessageHandler)
            ->build()
            ->consume();
    }
}
