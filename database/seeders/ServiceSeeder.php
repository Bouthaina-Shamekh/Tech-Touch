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
                'description_en' => '<p class="text-second font-light text-xs md:text-sm  md:leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt</p>',
                'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',
                'image' => '../asset/img/extra/services-01.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Training',
                'name_ar' => 'تصميم الجرافيك',
                'description_en' => '<p class="text-second font-light text-xs md:text-sm  md:leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt</p>',
                'description_ar' => 'خدماتنا في تصميم الجرافيك تقدم حلولاً إبداعية وجذابة بصريًا.',
                'image' => '../asset/img/extra/services-02.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Management Consulting',
                'name_ar' => 'التسويق الرقمي',
                'description_en' => ' <p class="text-second font-light text-xs md:text-sm  md:leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt</p>',
                'description_ar' => 'نحن متخصصون في استراتيجيات التسويق الرقمي لتعزيز تواجدك على الإنترنت.',
                'image' => '../asset/img/extra/services-03.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Business Development',
                'name_ar' => 'التسويق الرقمي',
                'description_en' => '<p class="text-second font-light text-xs md:text-sm  md:leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt</p>',
                'description_ar' => 'نحن متخصصون في استراتيجيات التسويق الرقمي لتعزيز تواجدك على الإنترنت.',
                'image' => '../asset/img/extra/services-04.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Data Analysis & Presentation',
                'name_ar' => 'التسويق الرقمي',
                'description_en' => ' <p class="text-second font-light text-xs md:text-sm  md:leading-6">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt</p>',
                'description_ar' => 'نحن متخصصون في استراتيجيات التسويق الرقمي لتعزيز تواجدك على الإنترنت.',
                'image' => '../asset/img/extra/services-05.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
