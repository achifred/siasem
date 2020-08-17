<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\PodcastLike;
use App\Podcast;
class PodcastLikeTest extends TestCase
{
    use RefreshDatabase;
    /** @test */

    public function test_a_podcastlike_can_be_created(){
        PodcastLikeTest::create([
            'podcast_id'=>1,
            'user_id'=>1
        ]);

        $this->assertCount(1, PodcastLikeTest::all());
    }

    public function test_a_podcast_can_be_liked(){
        Podcast::create([
            'description'=>'first audio file',
            'audio'=>'audio file',
            'author'=>1,
            'category_id'=>1,
        ]);
        $this->assertCount(1, Podcast::all());
        $response = Podcast::increment('likes', 1);
        $response->assertOk();
    }

    public function test_a_podcast_can_be_disliked(){
        Podcast::create([
            'description'=>'first audio file',
            'audio'=>'audio file',
            'author'=>1,
            'category_id'=>1,
        ]);
        $this->assertCount(1, Podcast::all());
         Podcast::increment('likes', 1);
        $response = Podcast::decrement('likes', 1);
        $response->assertOk();
    }
}
