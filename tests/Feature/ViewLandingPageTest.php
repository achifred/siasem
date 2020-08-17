<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Auth;

class ViewLandingPageTest extends TestCase
{
   //use RefreshDatabase;
   /** @test */
    public function test_landing_page_loads_correctly()
    {
       $this->withoutExceptionHandling();
       $response =$this->get('/');
       $response->assertStatus(200);
       //$response->assertSee("Siasem Jokes On You", $escaped = false);
    }

    /** @test */
    public function test_user_dashboard_page_loads_correctly()
    {
       $this->withoutExceptionHandling();
       $response =$this->get('/dashboard');
       $response->assertStatus(200);
       //$response->assertSee("Siasem Jokes On You", $escaped = false);
    }
}