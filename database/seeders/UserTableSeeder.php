<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        DB::table('users')->insert([
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
                'name' => 'Maura',
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
            [
                'name' => 'Macanaya',
                'email' => 'macanaya@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gaddang',
                'email' => 'gaddang@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plaza',
                'email' => 'plaza@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'San Antonio',
                'email' => 'sanantonio@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bukig',
                'email' => 'bukig@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tallungan',
                'email' => 'tallungan@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paddaya',
                'email' => 'paddaya@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Linao',
                'email' => 'linao@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zinarag',
                'email' => 'zinarag@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Binalan',
                'email' => 'Binalan@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bulala Norte',
                'email' => 'bulalanorte@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bulala Sur',
                'email' => 'bulalasur@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Centro 6',
                'email' => 'centro6@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Backiling',
                'email' => 'backiling@gmail.com',
                'password' => Hash::make('password'),
                'usertype' => 'barangay',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
