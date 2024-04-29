<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TypeAtelier;

use Illuminate\Database\Seeder;

class TypeAtelierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeAtelier::create([
            'type_atelier' => 'ChatGPT',
        ]);

        TypeAtelier::create([
            'type_atelier' => 'Peinture',
        ]);

    }
}
