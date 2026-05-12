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
        Schema::create('interview_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interview_email_id')->constrained()->cascadeOnDelete();
            $table->text('comments')->nullable();
            $table->string('final_recommendation')->nullable();
            $table->string('present_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('proposed_gross')->nullable();
            $table->string('proposed_ctc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_feedback');
    }
};
