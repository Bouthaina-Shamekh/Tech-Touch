<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionsShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $sections = [
            'herder' => true,
            'hero' => true,
            'about' => true,
            'services' => true,
            'files' => true,
            'partners' => true,
            'work' => true,
            'teams' => true,
            'clients' => true,
            'footer' => true,
            'contact' => true,
        ];
        Setting::updateOrCreate([
            'key' => 'sections_show',
        ],[
            'value' => json_encode($sections),
        ]);
    }
}
