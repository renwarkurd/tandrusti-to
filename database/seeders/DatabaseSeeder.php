<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Diagnosis;
use App\Models\GeneralNote;
use App\Models\History;
use App\Models\LaboratoryResult;
use App\Models\Medication;
use App\Models\Operation;
use App\Models\Patient;
use App\Models\Physiotherapy;
use App\Models\RadiologyResult;
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
            'name' => 'admin',
            'email' => null,
            'username' => 'admin',
            'password' => 'admin',
        ]);

        \App\Models\CodeType::create([
            'user_id' => 1,
            'name' => 'کارتی نیشتمانی',
        ]);
        \App\Models\CodeType::create([
            'user_id' => 2,
            'name' => 'پاسپۆرت',
        ]);

        City::factory()->count(10)->create();
        Patient::factory()->count(30)->create();
        History::factory()->count(16)->create();
        Diagnosis::factory()->count(16)->create();
        Operation::factory()->count(16)->create();
        Medication::factory()->count(16)->create();
        Physiotherapy::factory()->count(16)->create();
        LaboratoryResult::factory()->count(16)->create();
        RadiologyResult::factory()->count(16)->create();
        GeneralNote::factory()->count(16)->create();
    }
}
