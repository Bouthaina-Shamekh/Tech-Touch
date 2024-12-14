<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('works')->insert([
        [
            'name_en' => 'Programming',
            'name_ar' => 'البرمجة ',
            'image' => 'storage/images/1733291024 - portfolio-01.png',
            'link' => 'images/1733291024 - services-01.png.png',
            'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'Math',
            'name_ar' => 'الرياضيات',
            'image' => 'storage/images/1733291024 - portfolio-01.png',
            'link' => 'images/1733291024 - services-01.png.png',
            'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'Sience',
            'name_ar' => 'العلوم',
            'image' => 'storage/images/1733291024 - portfolio-01.png',
            'link' => 'images/1733291024 - services-01.png.png',
            'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],

    ]);
    }
}
