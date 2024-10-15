<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;

class KafkaProducer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:producer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Kafka producer';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Start Kafka producer');

        $message = new Message(
            headers: ['ContentType' => 'application/json'],
            body: ['key' => 'value'],
            key: 'kafka',
        );

        $producer = Kafka::publish()
            ->onTopic(config('kafka.default_topic'))
            ->withMessage($message);
        $producer->send(true);
    }
}
