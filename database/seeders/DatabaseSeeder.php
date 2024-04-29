<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            TypeArticleSeeder::class,
            TypeAtelierSeeder::class,
            TypePrestationSeeder::class,
            AtelierSeeder::class,
            PrestationSeeder::class,
            CommandeSeeder::class,
            TailleSeeder::class,
            CategoriePostSeeder::class,
            PostSeeder::class,
            ArticleSeeder::class,
            ArticleTailleSeeder::class,
            ReservationAtelierSeeder::class,
            CommandeArticleSeeder::class,
            ReservationPrestationSeeder::class
        ]);
    }
}
