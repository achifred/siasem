<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Podcast;
class PodCastManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
   
    public function test_an_audio_can_be_added_to_podcast(){
        $this->withoutExceptionHandling();
        $response = $this->post('/dashboard/podcast',[
            'description'=>'first audio file',
            'audio'=>'audio file',
            'author'=>1,
            'category_id'=>1,

        ]);

        $response->assertCount(1, Podcast::all());
        $response->assertRedirect('/dashboard/podcast');
    }
/** @test */
    public function test_an_audio_can_deleted(){
        $this->withoutExceptionHandling();
         $this->post('/dashboard/podcast',[
            'description'=>'first audio file',
            'audio'=>'audio file',
            'author'=>1,
            'category_id'=>1,

        ]);

        $podcast = Podcast::first();
        $this->assertCount(1, Podcast::all());
        $response = $this->delete('/podcast/'.$podcast->id);
        $response->assertCount(0, Podcast::all());
        $response->assertRedirect('/dashboard/podcast');

    }

    public function test_an_audio_can_be_liked(){
        $this->withoutExceptionHandling();
        $this->post('/dashboard/podcast',[
            'description'=>'first audio file',
            'audio'=>'audio file',
            'author'=>1,
            'category_id'=>1,

        ]);

        $podcast = Podcast::first();
        $this->assertCount(1,Podcast::all());

        $response = $this->post('/like/podcast/'.$podcast->id,[
            'likes'=>1
        ]);
        $response->assertRedirect('/podcast');
    }
    
}
