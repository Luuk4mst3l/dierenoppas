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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->string('type'); // Type van het huisdier (hond, kat, etc.)
            $table->text('availability')->nullable(); // Beschikbaarheid in datums
            $table->decimal('hourly_rate', 8, 2); // Uurtarief
            $table->text('special_instructions')->nullable(); // Speciale instructies
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
