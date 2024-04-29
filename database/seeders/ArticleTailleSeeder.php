<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ArticleTaille;
use App\Models\Taille;
use App\Models\Article;

use Illuminate\Support\Facades\DB;


class ArticleTailleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < Article::count(); $i++) {
            DB::table('article_tailles')->insert([
                'taille_id' => rand(1, Taille::count()),
                'article_id' => $i,
            ]);
        }
    }
}
