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
              'image' => 'partners/images/1733291024 - partners-03.png',
                'link' => 'https://google.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'partners/images/1733291024 - partners-02.png.png',
                  'link' => 'https://google.com',
                  'created_at' => now(),
                  'updated_at' => now(),
              ],
              [
                'image' => 'partners/images/1733291024 - partners-01.png',
                  'link' => 'https://google.com',
                  'created_at' => now(),
                  'updated_at' => now(),
              ],
              [
                'image' => 'partners/images/1733291024 - partners-03.png',
                  'link' => 'https://google.com',
                  'created_at' => now(),
                  'updated_at' => now(),
              ],
              [
                  'image' => 'partners/images/1733291024 - partners-02.png.png',
                    'link' => 'https://google.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                  'image' => 'partners/images/1733291024 - partners-01.png',
                    'link' => 'https://google.com',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        ]);
    }
}
