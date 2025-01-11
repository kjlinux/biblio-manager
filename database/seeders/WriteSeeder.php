<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('author_book')->insert([
            [
                'id_book' => 1,
                'id_aut' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_book' => 2,
                'id_aut' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_book' => 3,
                'id_aut' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_book' => 4,
                'id_aut' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_book' => 5,
                'id_aut' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
