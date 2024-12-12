<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seed_fertilizers')->insert([
            [
                'title' => 'Access Quality Seeds and Fertilizers',
                'content' => 'he Philippine Department of Agriculture (DA) has launched a new subsidy program aimed at improving the yield of rice farmers by providing access to high-quality seeds and fertilizers.',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => ' Impact of Seed Quality and Fertilizer',
                'content' => 'This report evaluates the impact of seed quality and fertilizer use on rice yields during the 2024 crop season in the Philippines. ',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'New Seed Variety',
                'content' => 'A new hybrid rice variety developed by the Philippine Rice Research Institute (PhilRice) is being hailed as a game-changer for rice farmers facing unpredictable climate conditions. ',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Organic Fertilizers in Rice Farming',
                'content' => 'The use of organic fertilizers has gained momentum as part of sustainable farming practices, particularly in rice production.',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
