<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TypeArticle;

use Illuminate\Database\Seeder;

class TypeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeArticle::create([
            'type_article' => 'T-Shirt',
        ]);

        TypeArticle::create([
            'type_article' => 'Tableau',
        ]);

    }
}
