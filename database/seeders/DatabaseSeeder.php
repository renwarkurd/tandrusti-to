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

        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'email' => null,
        //     'username' => 'admin',
        //     'password' => 'admin',
        // ]);

        \App\Models\CodeType::create([
            'id' => 1,
            'user_id' => 1,
            'name' => 'کارتی نیشتمانی',
        ]);
        \App\Models\CodeType::create([
            'id' => 2,
            'user_id' => 1,
            'name' => 'پاسپۆرت',
        ]);
        \App\Models\City::insert([
            ['name' => 'Baghdad'],
            ['name' => 'Basrah'],
            ['name' => 'Al Mawsil al Jadidah'],
            ['name' => 'Al Basrah al Qadimah'],
            ['name' => 'Mosul'],
            ['name' => 'Erbil'],
            ['name' => 'Abu Ghurayb'],
            ['name' => 'As Sulaymaniyah'],
            ['name' => 'Kirkuk'],
            ['name' => 'Najaf'],
            ['name' => 'Karbala'],
            ['name' => 'Nasiriyah'],
            ['name' => 'Al Amarah'],
            ['name' => 'Ad Diwaniyah'],
            ['name' => 'Al Kut'],
            ['name' => 'Al Hillah'],
            ['name' => 'Dihok'],
            ['name' => 'Ramadi'],
            ['name' => 'Al Fallujah'],
            ['name' => 'Samarra'],
            ['name' => 'As Samawah'],
            ['name' => 'Baqubah'],
            ['name' => 'Sinah'],
            ['name' => 'Az Zubayr'],
            ['name' => 'Kufa'],
            ['name' => 'Umm Qasr'],
            ['name' => 'Al Faw'],
            ['name' => 'Zaxo'],
            ['name' => 'Al Harithah'],
            ['name' => 'Ash Shatrah'],
            ['name' => 'Al Hayy'],
            ['name' => 'Jamjamal'],
            ['name' => 'Khalis'],
            ['name' => 'Tozkhurmato'],
            ['name' => 'Ash Shamiyah'],
            ['name' => 'Al Hindiyah'],
            ['name' => 'Halabjah'],
            ['name' => 'Al Miqdadiyah'],
            ['name' => 'Al-Hamdaniya'],
            ['name' => 'Ar Rumaythah'],
            ['name' => 'Koysinceq'],
            ['name' => 'Al Aziziyah'],
            ['name' => 'Al Musayyib'],
            ['name' => 'Tikrit'],
            ['name' => 'As Suwayrah'],
            ['name' => 'Balad'],
            ['name' => 'Sinjar'],
            ['name' => 'Imam Qasim'],
            ['name' => 'Bayji'],
            ['name' => 'Hit'],
            ['name' => 'Hadithah'],
            ['name' => 'Nahiyat Ghammas'],
            ['name' => 'Nahiyat Saddat al Hindiyah'],
            ['name' => 'Kifri'],
            ['name' => 'Mandali'],
            ['name' => 'Baynjiwayn'],
            ['name' => 'Anah'],
            ['name' => 'Ad Dujayl'],
            ['name' => 'Batufe'],
            ['name' => 'Tallkayf'],
            ['name' => 'Al Mishkhab'],
            ['name' => 'Aqrah'],
            ['name' => 'Ruwandiz'],
            ['name' => 'Nahiyat ash Shinafiyah'],
            ['name' => 'Ar Rutbah'],
            ['name' => 'Afak'],
            ['name' => 'Nahiyat al Fuhud'],
            ['name' => 'Anat al Qadimah'],
            ['name' => 'Ali al Gharbi'],
            ['name' => 'Rawah'],
        ]);

        // City::factory()->count(10)->create();
        // Patient::factory()->count(30)->create();
        // History::factory()->count(16)->create();
        // Diagnosis::factory()->count(16)->create();
        // Operation::factory()->count(16)->create();
        // Medication::factory()->count(16)->create();
        // Physiotherapy::factory()->count(16)->create();
        // LaboratoryResult::factory()->count(16)->create();
        // RadiologyResult::factory()->count(16)->create();
        // GeneralNote::factory()->count(16)->create();
    }
}
