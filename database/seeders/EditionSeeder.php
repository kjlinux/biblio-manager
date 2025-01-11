<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('editions')->insert([
            [
                'titre_ed' => 'Edition Alpha',
                'adresse_ed' => '123 Rue Principale, Paris',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre_ed' => 'Edition Beta',
                'adresse_ed' => '456 Avenue des Champs, Lyon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre_ed' => 'Edition Gamma',
                'adresse_ed' => '789 Boulevard de la Liberté, Marseille',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre_ed' => 'Edition Delta',
                'adresse_ed' => '101 Rue de la République, Bordeaux',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre_ed' => 'Edition Epsilon',
                'adresse_ed' => '202 Avenue de la Gare, Lille',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
