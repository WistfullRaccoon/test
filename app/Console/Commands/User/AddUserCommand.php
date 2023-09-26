<?php

namespace App\Console\Commands\User;

use App\Models\User;
use Illuminate\Console\Command;

class AddUserCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'user:add {name} {email} {password}';

    /**
     * @var string
     */
    protected $description = 'Adding new user';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        User::add([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $this->info('User is successfully added');
        return true;
    }
}
