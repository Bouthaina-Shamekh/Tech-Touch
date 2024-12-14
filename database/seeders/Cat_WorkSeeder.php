<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Cat_WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cat_works')->insert([
            [
                'name_en' => 'Laravel,php',
                'name_ar' => 'لارفيل',
                'work_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Distribute',
                'name_ar' => 'المنفصلة',
                'work_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'Physical',
                'name_ar' => 'فيزياء',
                'work_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
