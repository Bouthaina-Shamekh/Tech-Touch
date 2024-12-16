<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
                'name_en' => 'Hazem',
                'name_ar' => 'حازم',
                'image' => 'null',
                'feedback_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'feedback_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',
                'stars' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Bouthaina',
                'name_ar' => 'بثينة',
                'image' => 'null',
                'feedback_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'feedback_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',
                'stars' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Amer',
                'name_ar' => 'عامر',
                'image' => 'null',
                'feedback_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sed Diam Nonumy Eirmod Tempor Invidunt',
                'feedback_ar' => 'نقدم خدمات تطوير ويب احترافية لتحويل أفكارك إلى واقع.',
                'stars' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
