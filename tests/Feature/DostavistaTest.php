<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DostavistaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDostavista()
    {
        $response = $this->getJson('/api/delivery');

        $response->assertStatus(200)->assertJson([
            'is_successful' => true
        ]);
    }
}
