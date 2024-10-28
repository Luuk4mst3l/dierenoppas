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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained()->onDelete('cascade');
            $table->foreignId('sitter_id')->constrained('users')->onDelete('cascade');
            $table->date('start_date'); // Startdatum van de oppasaanvraag
            $table->date('end_date'); // Einddatum van de oppasaanvraag
            $table->enum('status', ['open', 'geaccepteerd', 'geweigerd']); // Status van de aanvraag
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
