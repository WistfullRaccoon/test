<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Str;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterForm()
    {
        $response = $this->get('/register');

        $response
            ->assertStatus(200);
//            ->assertSee('Register');
    }

    public function testErrors(): void
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
        ]);

        $response
            ->assertStatus(302)
            ->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function testSuccess(): void
    {
        $user = factory(User::class)->make();

        $response = $this->post('/register', [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'test',
            'password_confirmation' => 'test',
        ]);

        $response
            ->assertStatus(302)
            ->assertRedirect('/');
//            ->assertSessionHas('success', 'Check your email and click on the link to verify.');
    }

    public function testIncorrectVerify(): void
    {
        $response = $this->get('/verify/' . Str::uuid());

        $response
            ->assertStatus(302)
            ->assertRedirect('/')
            ->assertSessionHas('error', 'Sorry your link cannot be identified.');
    }

    public function testVerify(): void
    {
        $user = factory(User::class)->create([
            'status' => User::STATUS_WAIT,
            'verify_token' => Str::uuid(),
        ]);

        $response = $this->get('/verify/' . $user->verify_token);

        $response
            ->assertStatus(302)
            ->assertRedirect('/login');
//            ->assertSessionHas('success', 'Your e-mail is verified. You can now login.');
    }
}
