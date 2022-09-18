<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testEmision()
    {
        $this->get('/')->assertSee("Emision Calculator");
    }

    public function testProduct()
    {
        $this->get('/ecoProduct/list/All')->assertSee("Toothbrush");
    }

}
