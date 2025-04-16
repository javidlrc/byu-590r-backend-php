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
        Schema::dropIfExists('artists');
        
        Schema::create('artists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('genre_id'); // Assuming it references 'genres' table
            $table->string('name');
            $table->text('description'); // Changed to text for longer descriptions
            $table->string('favoriteSong')->nullable(); // Added field for favorite song
            $table->string('favAlbum')->nullable(); // Added field for favorite album
            $table->string('country')->nullable(); // Added field for country
            $table->string('file'); // Path to file (image)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artists');
    }
};
