<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Prestation;
use App\Models\User;

use Illuminate\Support\Facades\DB;

use Faker;

class ReservationPrestationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create();
        for ($i = 1; $i < 10; $i++) {
            DB::table('reservation_prestations')->insert([
                'prestation_id' => rand(1, Prestation::count()),
                'date_prestation' => $faker->unique()->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d H:i:s'),
                'user_id' => rand(1, User::count()),
            ]);
        }
    }
}
