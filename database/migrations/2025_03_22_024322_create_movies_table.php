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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('plot');
            $table->string('poster');
            $table->string('runtime');
            $table->integer('director_id');
            $table->string('writer');
            $table->integer('cast_id');
            $table->integer('genre_id');
            $table->integer('trailer_id');
            $table->integer('total_seasons');
            $table->string('type');
            $table->string('languages');
            $table->string('country_of_origin');
            $table->string('released_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
