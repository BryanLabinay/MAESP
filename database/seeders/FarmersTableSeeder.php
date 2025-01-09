<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FarmersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $index) { // Seed 10 farmers
            DB::table('farmers')->insert([
                'user_id' => $faker->numberBetween(2, 6), // Adjust based on your user IDs
                'first_name' => $faker->firstName,

                'middle_name' => $faker->lastName,
                'last_name' => $faker->lastName,
                'suffix' => $faker->suffix,
                'sex' => $faker->randomElement(['male', 'female']),
                'birth_date' => $faker->date(),
                'phone_number' => $faker->phoneNumber,
                'marital_status' => $faker->randomElement(['single', 'married', 'divorced', 'widowed']),
                'status' => $faker->randomElement(['active', 'inactive']),
                'name_of_spouse' => $faker->name,
                'spouse_number' => $faker->phoneNumber,
                'parent_name' => $faker->name,
                'parent_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'parcels' => json_encode([
                    [
                        'farm_location' => $faker->address,
                        'farm_area' => $faker->randomFloat(2, 1, 100),  // A number
                        'farm_type' => $faker->randomElement(['Organic', 'Conventional', 'Hydroponic']),
                        'crop_commodity' => $faker->randomElement(['Rice', 'Corn', 'Wheat', 'Vegetables']),
                    ],
                    [
                        'farm_location' => $faker->address,
                        'farm_area' => $faker->randomFloat(2, 1, 100),  // A number
                        'farm_type' => null,  // This can be null
                        'crop_commodity' => $faker->randomElement(['Rice', 'Corn', 'Wheat', 'Vegetables']),
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
