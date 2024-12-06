<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name_en' => 'Technical Services & Programming',
                'name_ar' => 'تطوير الويب',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',
                'image' => 'images/1733521413 - services-01.png.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Training',
                'name_ar' => 'تصميم الجرافيك',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'description_ar' => 'خدماتنا في تصميم الجرافيك تقدم حلولاً إبداعية وجذابة بصريًا.',
                'image' => 'images/1733521506 - services-02.png.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Management Consulting',
                'name_ar' => 'التسويق الرقمي',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'description_ar' => 'نحن متخصصون في استراتيجيات التسويق الرقمي لتعزيز تواجدك على الإنترنت.',
                'image' => 'images/1733521557 - services-03.png.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Business Development',
                'name_ar' => 'التسويق الرقمي',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'description_ar' => 'نحن متخصصون في استراتيجيات التسويق الرقمي لتعزيز تواجدك على الإنترنت.',
                'image' => 'images/1733521603 - services-04.png.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Data Analysis & Presentation',
                'name_ar' => 'التسويق الرقمي',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'description_ar' => 'نحن متخصصون في استراتيجيات التسويق الرقمي لتعزيز تواجدك على الإنترنت.',
                'image' => 'images/1733521650 - services-05.png.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
