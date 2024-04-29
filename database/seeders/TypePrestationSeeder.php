<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TypePrestation;

use Illuminate\Database\Seeder;

class TypePrestationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypePrestation::create([
            'type_prestation' => 'Logo',
        ]);

        TypePrestation::create([
            'type_prestation' => 'Banniere',
        ]);

    }
}
