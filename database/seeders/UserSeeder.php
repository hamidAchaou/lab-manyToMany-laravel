<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 users with random data
        // User::factory()->count(10)->create();

        // Alternatively, you can create specific users with defined data
        User::create([
            'name' => 'hamid',
            'email' => 'hamide@gmail.com',
        ]);

        User::create([
            'name' => 'khalid',
            'email' => 'khalid@gmail.com',
        ]);
    }
}
