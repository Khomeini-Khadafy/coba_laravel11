<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat manual data seeder
        User::create([
            'name'              => 'Khomeini Khadafy',
            'username'          => 'khomeini.khadafy',
            'email'             => 'khomeini.khadafy@gmail.com',
            'email_verified_at' =>  now(),
            'password'          =>  Hash::make('passowrd'),
            'remember_token'    =>  Str::random(10)
        ]);

        User::factory(5)->create();
    }
}
