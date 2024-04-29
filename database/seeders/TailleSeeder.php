<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Taille;
use Illuminate\Database\Seeder;


class TailleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Taille::factory()->count(3)->sequence(
            [ 'taille' => 'M' ],
            [ 'taille' => 'L' ],
            [ 'taille' => 'XL' ]
        )->create();;
    }
}