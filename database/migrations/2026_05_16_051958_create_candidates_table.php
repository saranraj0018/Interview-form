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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_post_id')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('source')->nullable();
            $table->string('position_applied')->nullable();
            $table->string('resume')->nullable();
            $table->string('full_name');
            $table->text('contact_address')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('current_gross')->nullable();
            $table->string('expected_gross')->nullable();
            $table->string('experience')->nullable();
            $table->string('notice_period')->nullable();
            $table->text('career_break')->nullable();
            $table->text('certifications')->nullable();
            $table->string('sunday_work')->nullable();
            $table->date('joining_date')->nullable();
            $table->text('litigation')->nullable();
            $table->text('employee_reference')->nullable();
            $table->date('declaration_date')->nullable();
            $table->string('place')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
