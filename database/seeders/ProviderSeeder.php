<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('providers')->insert([
            [
                'nom_four' => 'Fournisseur A',
                'adresse_four' => '123 Rue Principale, Paris',
                'telephone_four' => '0102030405',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_four' => 'Fournisseur B',
                'adresse_four' => '456 Avenue des Champs, Lyon',
                'telephone_four' => '0607080910',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_four' => 'Fournisseur C',
                'adresse_four' => '789 Boulevard de la Liberté, Marseille',
                'telephone_four' => '0506070809',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_four' => 'Fournisseur D',
                'adresse_four' => '101 Rue de la République, Bordeaux',
                'telephone_four' => '0405060708',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_four' => 'Fournisseur E',
                'adresse_four' => '202 Avenue de la Gare, Lille',
                'telephone_four' => '0304050607',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
