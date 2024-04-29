<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Commande;
use App\Models\Article;

use Illuminate\Support\Facades\DB;

class CommandeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= Commande::count(); $i++) {
            DB::table('commande_articles')->insert([
                'commande_id' => $i,
                'article_id' => rand(1, Article::count()),
                'quantite' => rand(1, 5),
            ]);
        }
    }
}
