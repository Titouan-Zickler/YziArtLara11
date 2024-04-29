<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'prenom' => 'yann',
            'nom' => 'zickler',
            'password' => Hash::make('Azerty88@'),
            'email' => 'admin@niceplaces.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(0),
            'role_id' => 2
        ]);

        User::create([
            'prenom' => 'titouan',
            'nom' => 'titouan',
            'password' => Hash::make('Azerty88@'),
            'email' => 'utilisateur@test.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        User::factory(8)->create();
    }
}