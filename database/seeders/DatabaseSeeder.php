<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert( [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'TORAN',
                'email' => 'toran@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muara',
                'email' => 'maura@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dodan',
                'email' => 'dodan@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Punta',
                'email' => 'punta@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paruddun',
                'email' => 'paruddun@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
