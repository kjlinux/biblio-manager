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
        Schema::create('book_provider', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_book')->constrained(
                table: 'books'
            );
            $table->foreignId('id_four')->constrained(
                table: 'providers'
            );
            $table->date('date_achat');
            $table->integer('quantite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_provider');
    }
};
