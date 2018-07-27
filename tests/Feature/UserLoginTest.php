<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginTest extends TestCase
{
    
    /**
     * Test login route.
     * 
     * @return void
     */
    public function test_login_route()
    {
        
        $this->get('/login')
             ->assertStatus(200);

    }

}
