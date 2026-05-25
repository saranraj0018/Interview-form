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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
             $table->string('name');
    $table->string('designation')->nullable();
    $table->date('doj')->nullable();
    $table->date('dob')->nullable();
    $table->string('contact')->nullable();
    $table->string('emergency_contact')->nullable();

    $table->string('father')->nullable();
    $table->string('mother')->nullable();
    $table->string('spouse')->nullable();

    $table->string('marital_status')->nullable();
    $table->string('gender')->nullable();

    $table->string('aadhaar')->nullable();
    $table->string('pan')->nullable();
    $table->text('present_address')->nullable();
    $table->text('permanent_address')->nullable();

    $table->string('blood_group')->nullable();
    $table->string('nominee')->nullable();

    // Bank
    $table->string('bank_account')->nullable();
    $table->string('bank_name')->nullable();
    $table->string('branch')->nullable();
    $table->string('ifsc')->nullable();
    $table->text('bank_address')->nullable();

    // Step 2
    $table->string('department')->nullable();
    $table->string('employee_code')->nullable();
    $table->string('photo')->nullable();
    $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
