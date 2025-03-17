<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Dafa Prasetya',
            'email' => 'dafaprstya150@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dafaprstya'),
            'role' => 'user',
            'picture' => 'user.png',
            'phone' => '081574999858',
            'bio' => 'teruslah bernafas',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
