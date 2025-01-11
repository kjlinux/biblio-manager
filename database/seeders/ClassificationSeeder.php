<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classifications')->insert([
            [
                'nom_class' => 'Science Fiction',
                'description_class' => 'Genre de fiction spéculative traitant des impacts imaginaires des avancées scientifiques et technologiques.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'Fantasy',
                'description_class' => 'Genre de fiction qui utilise la magie et d\'autres phénomènes surnaturels comme élément principal de l\'intrigue.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'Mystery',
                'description_class' => 'Genre de fiction qui traite de la résolution d\'un crime ou d\'un mystère.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'Thriller',
                'description_class' => 'Genre de fiction caractérisé par des sensations fortes, de la tension et de l\'excitation.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'Romance',
                'description_class' => 'Genre de fiction centré sur les relations amoureuses entre les personnages.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'Horror',
                'description_class' => 'Genre de fiction destiné à effrayer, terrifier ou dégoûter le lecteur.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'Non-Fiction',
                'description_class' => 'Genre de littérature basé sur des faits réels et des événements véridiques.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'Biography',
                'description_class' => 'Genre de littérature qui raconte la vie d\'une personne réelle.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'Self-Help',
                'description_class' => 'Genre de littérature destiné à aider les lecteurs à résoudre des problèmes personnels.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_class' => 'History',
                'description_class' => 'Genre de littérature qui traite des événements passés et de leur interprétation.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
