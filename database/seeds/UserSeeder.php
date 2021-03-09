<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole(['admin', 'user']);

        $user = User::create([
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('12345678')
        ]);

        $user->assignRole('user');
    }
}
