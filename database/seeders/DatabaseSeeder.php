<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'muhammad',
            'email' => 'muhammad@mail.com',
            'username' => 'muhammad',
            'password' => 'muhammad',
        ]);

        City::factory()->count(3)->create();
        Patient::factory()->count(30)->create();
    }
}
