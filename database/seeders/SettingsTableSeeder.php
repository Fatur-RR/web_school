<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'logo', 'value' => ''],
            ['key' => 'apk_name', 'value' => 'My Application'],
            ['key' => 'welcome_teks', 'value' => 'My Application'],
            ['key' => 'informasi_teks', 'value' => 'My Application'],
            ['key' => 'agenda_teks', 'value' => 'My Application'],
            ['key' => 'album_teks', 'value' => 'My Application'],
            ['key' => 'gallery_teks', 'value' => 'My Application'],



        ];

        DB::table('settings')->insert($settings);
    }
}
