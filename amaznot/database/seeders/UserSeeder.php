<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Admin",
            "password" => Hash::make('Soen_341_Admin'),
            "role" => "admin"
        ]);

        User::create([
            "name" => "testUser",
            "password" => Hash::make('123456789'),
            "role" => "user"
        ]);
    }
}
