<?php

namespace Database\Seeders;

use App\Models\Cat_Work;
use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Work::create([
                'name_en' => 'Profile ' . $i,
                'name_ar' => 'الملف الشخصي ' . $i,
                'link' => 'https://google.com',
                'image' => 'extra/profiles-01.png',
                'description_ar' => 'وصف الملف الشخصي ' . $i,
                'description_en' => 'Profile ' . $i . ' Description',
            ]);
        }
        for ($i = 1; $i <= 20; $i++) {
            Cat_Work::create([
                'name_en' => 'Category ' . $i,
                'name_ar' => 'القسم ' . $i,
                'work_id' => $i,
            ]);
        }
    }
}
