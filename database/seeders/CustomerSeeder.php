<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'nom_cl' => 'Dupont',
                'prenom_cl' => 'Jean',
                'adresse_cl' => '123 Rue Principale, Paris',
                'telephone_cl' => '0601020304',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Martin',
                'prenom_cl' => 'Marie',
                'adresse_cl' => '45 Avenue Victor Hugo, Lyon',
                'telephone_cl' => '0611121314',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Durand',
                'prenom_cl' => 'Sophie',
                'adresse_cl' => '78 Boulevard Saint-Germain, Paris',
                'telephone_cl' => '0633344455',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Lefevre',
                'prenom_cl' => 'Pierre',
                'adresse_cl' => '23 Rue de la Paix, Marseille',
                'telephone_cl' => '0644455566',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Moreau',
                'prenom_cl' => 'Lucie',
                'adresse_cl' => '56 Avenue des Champs-Élysées, Paris',
                'telephone_cl' => '0655566677',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Simon',
                'prenom_cl' => 'Paul',
                'adresse_cl' => '34 Rue de Rivoli, Paris',
                'telephone_cl' => '0666677788',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Michel',
                'prenom_cl' => 'Claire',
                'adresse_cl' => '89 Rue de la Liberté, Lyon',
                'telephone_cl' => '0677788899',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Bernard',
                'prenom_cl' => 'Louis',
                'adresse_cl' => '45 Rue de la République, Bordeaux',
                'telephone_cl' => '0688899900',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Thomas',
                'prenom_cl' => 'Julie',
                'adresse_cl' => '67 Avenue de la Gare, Lille',
                'telephone_cl' => '0699900011',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Petit',
                'prenom_cl' => 'Nicolas',
                'adresse_cl' => '12 Rue de la Liberté, Nantes',
                'telephone_cl' => '0600011122',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_cl' => 'Robert',
                'prenom_cl' => 'Isabelle',
                'adresse_cl' => '34 Rue de la République, Strasbourg',
                'telephone_cl' => '0611122233',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
