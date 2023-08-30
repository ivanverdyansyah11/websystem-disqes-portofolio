<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Auth;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Auth::create([
            'username' => 'Ivan Verdyansyah',
            'email' => 'ivanverdyansyah@gmail.com',
            'password' => bcrypt('ivan123'),
            'role' => 'owner',
        ]);
    }
}
