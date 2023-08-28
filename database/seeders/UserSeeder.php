<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            "email" => "admin@m.com"
        ], [
            "name" => "admin",
            "email" => "admin@m.com",
            "password" => bcrypt("password"),
        ]);

        $user->assignRole("admin");

// 

        $user = User::firstOrCreate([
            "email" => "moderator@m.com"
        ], [
            "name" => "moderator",
            "email" => "moderator@m.com",
            "password" => bcrypt("password"),
        ]);

        $user->assignRole("moderator");
    }
}
