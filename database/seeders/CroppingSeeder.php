<?php

namespace Database\Seeders;

use App\Models\Cropping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CroppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) { // Create 50 Cropping records
            // Generate random parcel data
            $parcels = [];
            $parcelCount = $faker->numberBetween(1, 5); // Each user has 1-5 parcels

            for ($j = 0; $j < $parcelCount; $j++) {
                $parcels[] = [
                    'farm_location' => $faker->city,
                    'variety' => $faker->word,
                    'farm_type' => $faker->randomElement(['1', '2', '3']), // Random farm type
                    'area' => $faker->randomFloat(2, 1, 100), // Random area (1.00 - 100.00)
                    'sowing_date' => $faker->date(),
                    'transplanting_date' => $faker->date(),
                    'date_harvested' => $faker->date(),
                    'gross' => $faker->randomFloat(2, 1000, 5000), // Random gross value
                    'average' => $faker->randomFloat(2, 10, 100), // Random average value
                    'crop_commodity' => $faker->randomElement(['Wheat', 'Rice', 'Corn', 'Soybean', 'Cotton']),
                ];
            }

            // Create a Cropping record
            Cropping::create([
                'user_id' => 2, // Generate a random UUID
                'first_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'last_name' => $faker->lastName,
                'suffix' => $faker->randomElement(['Jr.', 'Sr.', 'III', null]),
                'sex' => $faker->randomElement(['Male', 'Female']),
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'parcels' => json_encode($parcels), // Convert parcels to JSON
            ]);
        }
    }
}
