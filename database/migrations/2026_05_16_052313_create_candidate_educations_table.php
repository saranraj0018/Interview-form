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
        Schema::create('candidate_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')
              ->constrained()
              ->onDelete('cascade');
            $table->string('degree')->nullable();
            $table->string('division')->nullable();
            $table->string('college')->nullable();
            $table->string('university')->nullable();
            $table->string('marks')->nullable();
            $table->string('subjects')->nullable();
            $table->string('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_educations');
    }
};
