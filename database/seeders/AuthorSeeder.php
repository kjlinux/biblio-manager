<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'nom_aut' => 'Hugo',
                'prenom_aut' => 'Victor',
                'nationalite_aut' => 'Française',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Austen',
                'prenom_aut' => 'Jane',
                'nationalite_aut' => 'Anglaise',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Tolkien',
                'prenom_aut' => 'J.R.R.',
                'nationalite_aut' => 'Anglaise',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Hemingway',
                'prenom_aut' => 'Ernest',
                'nationalite_aut' => 'Américaine',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Dostoevsky',
                'prenom_aut' => 'Fyodor',
                'nationalite_aut' => 'Russe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Orwell',
                'prenom_aut' => 'George',
                'nationalite_aut' => 'Anglaise',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Dickens',
                'prenom_aut' => 'Charles',
                'nationalite_aut' => 'Anglaise',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Proust',
                'prenom_aut' => 'Marcel',
                'nationalite_aut' => 'Française',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Kafka',
                'prenom_aut' => 'Franz',
                'nationalite_aut' => 'Tchèque',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom_aut' => 'Fitzgerald',
                'prenom_aut' => 'F. Scott',
                'nationalite_aut' => 'Américaine',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
