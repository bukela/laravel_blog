<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'Laravel blog',
            'address' => 'Serbia, Novi Sad',
            'contact_number' => '066000978',
            'contact_email' => 'bukela@gmail.com'
        ]);
    }
}
