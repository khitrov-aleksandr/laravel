<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderCreateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->postJson('/api/delivery', ['service' => 'Dostavista']);
        //$response->dumpHeaders();

        //$response->dumpSession();

        $response->dump();
        $response->assertStatus(200);
    }
}
