<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            Service::create([
                'name_en' => 'Service ' . $i,
                'name_ar' => 'خدمة ' . $i,
                'description_ar' => 'لوريم إيبسوم دولور سيت أميت، كونسيتيتور ساديبسينج إليتر، سد ديام نونومي إيرمود تيمبور إنفيدونت',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'image' => 'asset/img/extra/services-0' . $i . '.png',
            ]);
        }
    }
}
