<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Routing\RouteCollection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test user.
     * 
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Setup test.
     * 
     * @return void
     */
    public function setUp()
    {

        parent::setUp();

        //  Create test user.
        $this->user = factory(User::class)->create();

    }
    
    /**
     * Test login route.
     * 
     * @return void
     */
    public function test_login_route()
    {
        
        $this->get(route('login'))
            ->assertStatus(200);

    }

    /**
     * Test a user can login.
     * 
     * @return void
     */
    public function test_user_can_login()
    {

        $this->post(route('login'), [

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

        $this->post(route('login'), [

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

        $this->post(route('login'), [

            'email' => $this->user->email,
            'password' => ''

        ])->assertSessionHasErrors('password');

    }

    /**
     * Test a user can't login with invalid data.
     * 
     * @return void
     */
    public function test_user_cant_login_with_invalid_data()
    {

        $this->post(route('login'), [

            'email' => 'emailn0tf0und@test.com',
            'password' => 'thisisn0tmypass'

        ])->assertSessionHasErrors();

    }

}
