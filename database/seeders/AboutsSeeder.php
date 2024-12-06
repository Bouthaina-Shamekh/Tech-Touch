<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AboutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('abouts')->insert([
            [
                'name_en' => 'About Us',
                'name_ar' => 'من نحن 1',
                'title_en' => 'What Are tech touch',
                'title_ar' => 'عنوان 1',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet.<br>

Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo',
                'description_ar' => 'الوصف 1',
                'image' => 'images/1733520502 - about-1.jpg.jpg',
                'partner' => 5,
                'employee' => 30,
                'project' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
