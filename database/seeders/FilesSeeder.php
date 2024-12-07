<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            File::create([
                'file_name_en' => 'File ' . $i,
                'file_name_ar' => 'ملف ' . $i,
                'file' => 'files/file.pdf',
                'description_ar' => 'وصف ' . $i,
                'description_en' => 'Description ' . $i,
                'price' => '23.5',
                'user_id' => 1
            ]);
        }
    }
}
