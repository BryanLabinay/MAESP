<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('market_prices')->insert([
            [
                'title' => 'Rice Market Prices Continue to Surge Amid Supply Shortages',
                'content' => 'Rice market prices have seen a significant increase over the past month, as supply shortages and high demand continue to impact the market.',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Local Vegetable Prices Surge Amid Supply Disruptions in Luzon',
                'content' => 'Market prices for vegetables in Luzon have experienced a sharp increase over the past few weeks, driven by supply chain disruptions caused by recent storms and flooding.',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sugar Prices Set to Rise in 2025 Amid Shortage of Local Production',
                'content' => 'The price of sugar in the Philippines is expected to rise in 2025, as the country sugarcane industry faces a significant decline in production.',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Coconut Oil Prices Hit Record Highs Due to Global Supply Shortage',
                'content' => 'Coconut oil prices in the Philippines have reached record highs, following a global supply shortage caused by a decline in coconut production in major exporting countries. ',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
