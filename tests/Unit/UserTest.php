<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function test_a_user_can_be_created(){
        User::create([
            'username'=>'username',
            'email'=>'useremail',
            'password'=>'userpassword',
            'role'=>'author'
        ]);
        $this->assertCount(1, User::all());
    }
}
