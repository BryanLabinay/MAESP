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

        for ($i = 0; $i < 100; $i++) {
            DB::table('farmers')->insert([
                'user_id' => $faker->numberBetween(2, 6), // Assuming you have users with IDs from 1 to 50
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'sex' => $faker->randomElement(['male', 'female']),
                'marital_status' => $faker->randomElement(['Single', 'Married', 'Divorced']),
                'birth_date' => $faker->date,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,

                'farm_name' => $faker->company,
                'farm_location' => $faker->city,
                'farm_size' => $faker->randomFloat(2, 1, 100), // Random size between 1 to 100 acres
                'crop_type' => $faker->word(['Rice', 'Corn', 'Vegetables', 'Fruits']),

                'ownership_type' => $faker->randomElement(['Registered Owner', 'Tenant', 'Lessee', 'Others']),
                'name_of_owner' => $faker->name,

                'farm_type' => $faker->randomElement(['Irrigated', 'Rainfed Upland', 'Rainfed Lowland']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
