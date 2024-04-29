<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CategoriePost;

use Illuminate\Database\Seeder;

class CategoriePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriePost::create([
            'categorie_post' => 'Nouvelles Technologies',
        ]);

        CategoriePost::create([
            'categorie_post' => 'Imprimante 3D',
        ]);

    }
}
