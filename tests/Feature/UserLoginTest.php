<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test user.
     */
    protected $user;

    /**
     * A route used for testing.
     * 
     * @var string
     */
    protected $login_route;

    /**
     * Setup test.
     * 
     * @return void
     */
    public function setUp()
    {

        parent::setUp();

        $this->login_route = route('login');
        $this->user = factory(User::class)->create();

    }
    
    /**
     * Test login route.
     * 
     * @return void
     */
    public function test_login_route()
    {
        
        $this->get($this->login_route)
            ->assertStatus(200);

    }

    /**
     * Test a user can login.
     * 
     * @return void
     */
    public function test_user_can_login()
    {

        $this->post($this->login_route, [

            'email' => $this->user->email,
            'password' => 'secret'

        ])->assertRedirect(route('post.index'));

    }

    /**
     * Test a user can logout.
     * 
     * @return void
     */
    public function test_user_can_logout()
    {

        $this->actingAs($this->user)
            ->post(route('logout'))
            ->assertRedirect(route('home'));

    }

    /**
     * Test a user can't login without an email address.
     * 
     * @return void
     */
    public function test_user_cant_login_without_email()
    {

        $this->post($this->login_route, [

            'email' => '',
            'password' => $this->user->password

        ])->assertSessionHasErrors('email');
        
    }

    /**
     * Test a user can't login without a password.
     * 
     * @return void
     */
    public function test_user_cant_login_without_password()
    {

        $this->post($this->login_route, [

            'email' => $this->user->email,
            'password' => ''

        ])->assertSessionHasErrors('password');

    }

}
