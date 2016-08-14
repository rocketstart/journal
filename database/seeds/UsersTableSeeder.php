<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();

        User::create([
            'name'     => 'Administrator',
            'email'    => 'administrator@rocketstart.ch',
            'password' => 'secret',
        ]);
    }
}
