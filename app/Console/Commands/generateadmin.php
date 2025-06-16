<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class generateadmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generateadmin:credential {username} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('username');
        $email = $this->argument('email');
        $password = $this->argument('password');
        $user = User::create([
           User::FIRST_NAME => $name,
           User::GENDER => 'Male',
           User::EMAIL => $email,
           User::PASSWORD => Hash::make($password),
        ]);
        $user->assignRole('admin');
        $this->info("admin generated...!");
    }
}
