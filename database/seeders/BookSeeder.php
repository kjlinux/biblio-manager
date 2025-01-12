<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'isbn' => 9781234567897,
                'titre' => 'Le Meilleur des Mondes',
                'langue' => 'Français',
                'prix' => 20,
                'edition_id' => 1,
                'classification_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => 9782345678901,
                'titre' => '1984',
                'langue' => 'Français',
                'prix' => 15,
                'edition_id' => 2,
                'classification_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => 9783456789012,
                'titre' => 'Le Seigneur des Anneaux',
                'langue' => 'Français',
                'prix' => 25,
                'edition_id' => 3,
                'classification_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => 9784567890123,
                'titre' => 'Crime et Châtiment',
                'langue' => 'Français',
                'prix' => 18,
                'edition_id' => 4,
                'classification_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => 9785678901234,
                'titre' => 'Les Misérables',
                'langue' => 'Français',
                'prix' => 22,
                'edition_id' => 5,
                'classification_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
