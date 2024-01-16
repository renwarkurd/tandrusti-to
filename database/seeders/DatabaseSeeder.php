<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        \App\Models\CodeType::insert([
            ['id' => 1, 'name' => 'کارتی نیشتمانی'],
            ['id' => 2, 'name' => 'پاسپۆرت']
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

        // \App\Models\City::factory()->count(10)->create();
        // \App\Models\Patient::factory()->count(30)->create();
        // \App\Models\History::factory()->count(16)->create();
        // \App\Models\Diagnosis::factory()->count(16)->create();
        // \App\Models\Operation::factory()->count(16)->create();
        // \App\Models\Medication::factory()->count(16)->create();
        // \App\Models\Physiotherapy::factory()->count(16)->create();
        // \App\Models\LaboratoryResult::factory()->count(16)->create();
        // \App\Models\RadiologyResult::factory()->count(16)->create();
        // \App\Models\GeneralNote::factory()->count(16)->create();
    }
}
