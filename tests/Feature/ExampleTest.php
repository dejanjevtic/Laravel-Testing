<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    /** @test */
    public function about_route_return_something(){
        $response = $this->get('/about');
        //dd($response);
        $response->assertSee('About');
    }
}
