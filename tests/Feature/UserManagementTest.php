<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
class UserManagementTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function test_a_user_can_be_created(){
        $this->withoutExceptionHandling();
        $this->post('/user',[
            'username'=>'username',
            'email'=>'useremail',
            'password'=>'userpasword',
            'role'=>'author'
        ]);
        $this->assertCount(1, User::all());
        
    }
}
