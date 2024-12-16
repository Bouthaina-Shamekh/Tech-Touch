<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teams')->insert([
            [
                'name_en' => 'Shamekh',
                'name_ar' => 'شامخ',
                'Specialization_en' => 'Ui Ux',
                'Specialization_ar' => 'Ui Ux',
                'image' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Jehad',
                'name_ar' => 'جهاد',
                'Specialization_en' => 'Laravel',
                'Specialization_ar' => 'لارفيل',
                'image' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'name_en' => 'Bouthaina',
                'name_ar' => 'بثينة',
                'Specialization_en' => 'Engineer',
                'Specialization_ar' => 'مهندسة',
                'image' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Shamekh',
                'name_ar' => 'شامخ',
                'Specialization_en' => 'Ui Ux',
                'Specialization_ar' => 'Ui Ux',
                'image' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Jehad',
                'name_ar' => 'جهاد',
                'Specialization_en' => 'Laravel',
                'Specialization_ar' => 'لارفيل',
                'image' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'name_en' => 'Bouthaina',
                'name_ar' => 'بثينة',
                'Specialization_en' => 'Engineer',
                'Specialization_ar' => 'مهندسة',
                'image' => 'null',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
