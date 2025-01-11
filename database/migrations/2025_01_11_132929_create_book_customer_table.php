<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book_customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cl')->constrained(
                table: 'customers'
            );
            $table->foreignId('id_book')->constrained(
                table: 'books'
            );
            $table->date('date_emprunt');
            $table->date('date_depot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_customer');
    }
};
