<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UsersTableSeeder::class);
        //$this->call(HomeSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(HeroSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(WorkSeeder::class);
        $this->call(Cat_WorkSeeder::class);
    }
}
