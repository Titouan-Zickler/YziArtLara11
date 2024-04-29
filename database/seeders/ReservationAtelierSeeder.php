<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Atelier;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class ReservationAtelierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 10; $i++) {
            DB::table('reservation_ateliers')->insert([
                'atelier_id' => rand(1, Atelier::count()),
                'user_id' => rand(1, User::count()),
            ]);
        }
    }
}
