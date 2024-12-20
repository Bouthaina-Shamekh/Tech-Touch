<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('partners')->insert([
            [
              'image' => '../asset/img/extra/partners-01.png',
                'link' => 'https://google.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => '../asset/img/extra/partners-02.png',
                  'link' => 'https://google.com',
                  'created_at' => now(),
                  'updated_at' => now(),
              ],
              [
                'image' => '../asset/img/extra/partners-03.png',
                  'link' => 'https://google.com',
                  'created_at' => now(),
                  'updated_at' => now(),
              ],
              [
                'image' => '../asset/img/extra/partners-01.png',
                  'link' => 'https://google.com',
                  'created_at' => now(),
                  'updated_at' => now(),
              ],
              [
                  'image' => '../asset/img/extra/partners-02.png',
                    'link' => 'https://google.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                  'image' => '../asset/img/extra/partners-03.png',
                    'link' => 'https://google.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                  'image' => '../asset/img/extra/partners-01.png',
                    'link' => 'https://google.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                  'image' => '../asset/img/extra/partners-02.png',
                    'link' => 'https://google.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                  'image' => '../asset/img/extra/partners-03.png',
                    'link' => 'https://google.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        ]);
    }
}
