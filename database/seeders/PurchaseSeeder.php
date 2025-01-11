<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_provider')->insert([
            [
                'id_book' => 1,
                'id_four' => 1,
                'date_achat' => '2023-01-01',
                'quantite' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_book' => 2,
                'id_four' => 2,
                'date_achat' => '2023-02-01',
                'quantite' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_book' => 3,
                'id_four' => 3,
                'date_achat' => '2023-03-01',
                'quantite' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_book' => 4,
                'id_four' => 4,
                'date_achat' => '2023-04-01',
                'quantite' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_book' => 5,
                'id_four' => 5,
                'date_achat' => '2023-05-01',
                'quantite' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
