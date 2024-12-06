<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            [
                'name_en' => 'Idea',
                'name_ar' => 'شريحة الترحيب',
                'description_en' => 'Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Voluptatem Accusantium Doloremque Laudantium, Totam Rem',
                'description_ar' => 'مرحبًا بكم في موقعنا! اكتشف خدماتنا ومميزاتها.',
                'btn' => 'Learn More',
                'link' => '/about',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Plan',
                'name_ar' => 'رؤيتنا',
                'description_en' => 'Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Voluptatem Accusantium Doloremque Laudantium, Totam Rem.',
                'description_ar' => 'تعرف على مهمتنا ورؤيتنا للمستقبل.',
                'btn' => 'Read More',
                'link' => '/vision',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Project',
                'name_ar' => 'ابدأ الآن',
                'description_en' => 'Sed Ut Perspiciatis Unde Omnis Iste Natus Error Sit Voluptatem Accusantium Doloremque Laudantium, Totam Rem',
                'description_ar' => 'انضم إلينا اليوم وارتقِ بعملك إلى المستوى التالي.',
                'btn' => 'Sign Up',
                'link' => '/register',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
