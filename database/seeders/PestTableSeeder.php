<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news_diseases')->insert([
            [
                'title' => 'Rice Blast Disease Outbreak',
                'content' => 'Rice fields affected by a sudden outbreak of rice blast. Symptoms include water-soaked lesions and irregularly shaped lesions on leaves.',
                'date' => now(),
                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rice Stem Borer (Scirpophaga excerptalis)',
                'content' => 'The Rice Stem Borer is a significant pest in rice-growing regions. The larvae of this moth bore into the rice stem, causing wilting, drying, and eventually the death of affected tillers.',
                'date' => now(),

                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rice Leaf Folder (Cnaphalocrocis medinalis) Infestation',
                'content' => ' The Rice Leaf Folder continues to cause damage in the Ilocos Region. This pest folds the rice leaves, feeding on the leaf tissues inside. ',
                'date' => now(),

                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rice Gall Midge (Orseolia oryzae)',
                'content' => ' Rice Gall Midge is a significant pest that damages rice by attacking the growing point of young rice plants. ',
                'date' => now(),

                // 'usertype' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
