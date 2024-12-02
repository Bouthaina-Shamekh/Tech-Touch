<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Hero;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::create([
            'name_en' => 'Plan',
            'name_ar' => 'خطة',
            'description_en' => 'Qui ex nulla minus c Qui ex nulla minus c',
            'description_ar' => 'وصف الخطة ..................................',
            'btn' => 'btn',
            'link' => '#',
        ]);
        Slider::create([
            'name_en' => 'idea',
            'name_ar' => 'الفكرة',
            'description_en' => 'Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Voluptatem Accusantium Doloremque Laudantium, Totam Rem',
            'description_ar' => 'وصف الخطة ..................................',
            'btn' => 'btn',
            'link' => '#',
        ]);
        Slider::create([
            'name_en' => 'project',
            'name_ar' => 'المشروع',
            'description_en' => 'projectprojectprojectprojectprojectprojectproject',
            'description_ar' => 'وصف الخطة ..................................',
            'btn' => 'btn',
            'link' => '#',
        ]);
        About::create([
            'name_en' => 'About Us',
            'name_ar' => 'من نحن',
            'title_en' => 'What Are tech touchhhhhhhhhhh',
            'title_ar' => 'ماذا نقدم',
            'description_en' => 'Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Voluptatem Accusantium Doloremque Laudantium, Totam Rem',
            'description_ar' => 'وصف  ..................................',
            'image1' => 'images/1732963371 - ooo.JPEG.jpg',
        ]);
        Hero::create([
            'name_en' => 'Services',
            'name_ar' => 'الخدمات',
            'title_en' => 'The Best Service We Offerrrrrrrrr',
            'title_ar' => 'اللهم ارحم شامخ كلوب',
            'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat, Sed Diam Voluptua. At Vero Eos Et Accusam Et Justo Duo Dolores Et Ea Rebum. Stet Clita Kasd Gubergren, No Sea Takimata Sanctus Est Lorem Ipsum Dolor Sit Amet. Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt Ut Labore Et Dolore Magna Aliquyam Erat',
            'description_ar' => 'وصف  ..................................',
            'image1' => 'images/1732963354 - 468330804_122174299904109335_1825953604556032269_n.jpg.jpg',
            'image1' => 'images/1732527830 - lock.png.png',
            'section' => 'Services',
        ]);
        Hero::create([
            'name_en' => 'Files',
            'name_ar' => 'الملفات',
            'title_en' => 'The Secret To Success May Be Inside One Of The Filessssssssssssss',
            'title_ar' => 'اللهم ارحم شامخ كلوب',
            'description_ar' => 'اللهم ارحم شامخ كلوب',
            'image1' => 'images/1732963354 - 468330804_122174299904109335_1825953604556032269_n.jpg.jpg',
            'section' => 'Files',
        ]);
        Hero::create([
            'name_en' => 'Works',
            'name_ar' => 'الاعمال',
            'title_en' => 'Improve & Enhance the Tech Projectsssssssssss',
            'section' => 'Works',
        ]);
    }
}
