<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('files')->insert([
            [
                'file_name_en' => 'File Name',
                'file_name_ar' => 'الشروط والأحكام',
                'file' => 'files/1733521413 - file-01.pdf',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sedss Diam Nonumy',
                'description_ar' => 'هذا المستند يوضح الشروط والأحكام لخدماتنا.',
                'price' => 25.99,
                'btn' => 'Download Now',
                'user_id' => 1, // تأكد من أن المستخدم برقم 1 موجود في جدول users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'file_name_en' => 'File Name',
                'file_name_ar' => 'سياسة الخصوصية',
                'file' => 'files/1733521413 - file-01.pdf',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sedss Diam Nonumy',
                'description_ar' => 'سياسة الخصوصية لدينا توضح كيفية تعاملنا مع بيانات المستخدم.',
                'price' => 15.99,
                'btn' => 'View Document',
                'user_id' => 2, // تأكد من أن المستخدم برقم 2 موجود في جدول users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'file_name_en' => 'File Name',
                'file_name_ar' => 'دليل المستخدم',
                'file' => 'files/1733521413 - file-01.pdf',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sedss Diam Nonumy',
                'description_ar' => 'دليل شامل لمساعدة المستخدمين على البدء.',
                'price' => 10.99,
                'btn' => null,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'file_name_en' => 'File Name',
                'file_name_ar' => 'دليل المستخدم',
                'file' => 'files/1733521413 - file-01.pdf',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sedss Diam Nonumy',
                'description_ar' => 'دليل شامل لمساعدة المستخدمين على البدء.',
                'price' => 10.99,
                'btn' => null,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'file_name_en' => 'File Name',
                'file_name_ar' => 'دليل المستخدم',
                'file' => 'files/1733521413 - file-01.pdf',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sedss Diam Nonumy',
                'description_ar' => 'دليل شامل لمساعدة المستخدمين على البدء.',
                'price' => 10.99,
                'btn' => null,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'file_name_en' => 'File Name',
                'file_name_ar' => 'دليل المستخدم',
                'file' => 'files/1733521413 - file-01.pdf',
                'description_en' => 'Lorem Ipsum Dolor Sit Amet, Consetetur Sadipscing Elitr, Sedss Diam Nonumy',
                'description_ar' => 'دليل شامل لمساعدة المستخدمين على البدء.',
                'price' => 10.99,
                'btn' => null,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
