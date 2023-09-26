<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testAdding(): void
    {
        $name = 'name';
        $email = 'email';
        $password = 'password';

        $user = User::add([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            ]);

        self::assertNotEmpty($user);

        self::assertEquals($name, $user->name);
        self::assertEquals($email, $user->email);
        self::assertNotEmpty($user->password);
        self::assertNotEquals($password, $user->password);

        self::assertTrue($user->isActive());
        self::assertFalse($user->isWait());
        self::assertFalse($user->isAdmin()||$user->isTeacher()||$user->isModerator());
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }


}
