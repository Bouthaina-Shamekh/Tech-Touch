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
            'name_en' => 'The Project Name',
            'name_ar' => 'البرمجة ',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'الرياضيات',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name_en' => 'The Project Name',
            'name_ar' => 'العلوم',
            'image' => '../asset/img/extra/portfolio-01.png',
            'link' => 'https://google.com',
            'description_en' => '<p class="text-dark font-light text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.</p>
                    <p class="text-dark  font-light  text-base leading-6 right__portfolio">Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo</p>',
            'description_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',

            'created_at' => now(),
            'updated_at' => now(),
        ],

    ]);
    }
}
