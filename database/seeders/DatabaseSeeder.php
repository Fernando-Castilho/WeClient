<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Fernando',
            'email' => 'administrador@exemplo.com',
            'password' => '$2y$12$a0mSVwUbnzk7ji7Awn1Oj.S1TWhRB048RmIPDynLsRdanZxoGOgdu'
        ]);

         \App\Models\Cliente::factory(50)->create();
    }
}
