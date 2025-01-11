<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('book_customer')->insert([
            [
                'id_cl' => 1,
                'id_book' => 1,
                'date_emprunt' => '2023-01-01',
                'date_depot' => '2023-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_cl' => 2,
                'id_book' => 2,
                'date_emprunt' => '2023-02-01',
                'date_depot' => '2023-02-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_cl' => 3,
                'id_book' => 3,
                'date_emprunt' => '2023-03-01',
                'date_depot' => '2023-03-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_cl' => 4,
                'id_book' => 4,
                'date_emprunt' => '2023-04-01',
                'date_depot' => '2023-04-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_cl' => 5,
                'id_book' => 5,
                'date_emprunt' => '2023-05-01',
                'date_depot' => '2023-05-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
