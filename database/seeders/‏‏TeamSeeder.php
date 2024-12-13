<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'Specialization_en	' => 'Ui Ux',
                'Specialization_ar	' => 'Ui Ux',
                'image' => 'storage/images/team-02.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Jehad',
                'name_ar' => 'جهاد',
                'Specialization_en	' => 'Laravel',
                'Specialization_ar	' => 'لارفيل',
                'image' => 'storage/images/team-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'name_en' => 'Bouthaina',
                'name_ar' => 'بثينة',
                'Specialization_en	' => 'Engineer',
                'Specialization_ar	' => 'مهندسة',
                'image' => 'storage/images/team-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Shamekh',
                'name_ar' => 'شامخ',
                'Specialization_en	' => 'Ui Ux',
                'Specialization_ar	' => 'Ui Ux',
                'image' => 'storage/images/team-02.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Jehad',
                'name_ar' => 'جهاد',
                'Specialization_en	' => 'Laravel',
                'Specialization_ar	' => 'لارفيل',
                'image' => 'storage/images/team-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
               'name_en' => 'Bouthaina',
                'name_ar' => 'بثينة',
                'Specialization_en	' => 'Engineer',
                'Specialization_ar	' => 'مهندسة',
                'image' => 'storage/images/team-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
