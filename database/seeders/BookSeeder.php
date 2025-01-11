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
                'id_ed' => 1,
                'id_class' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => 9782345678901,
                'titre' => '1984',
                'langue' => 'Français',
                'prix' => 15,
                'id_ed' => 2,
                'id_class' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => 9783456789012,
                'titre' => 'Le Seigneur des Anneaux',
                'langue' => 'Français',
                'prix' => 25,
                'id_ed' => 3,
                'id_class' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => 9784567890123,
                'titre' => 'Crime et Châtiment',
                'langue' => 'Français',
                'prix' => 18,
                'id_ed' => 4,
                'id_class' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'isbn' => 9785678901234,
                'titre' => 'Les Misérables',
                'langue' => 'Français',
                'prix' => 22,
                'id_ed' => 5,
                'id_class' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
