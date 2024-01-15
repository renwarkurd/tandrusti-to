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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('code')->unique();
            $table->string('code_type', 50);
            $table->tinyInteger('gender');
            $table->string('dob_year', 5);
            $table->string('dob_month', 5)->nullable();
            $table->string('dob_day', 5)->nullable();
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_1')->nullable();
            $table->string('contact_2')->nullable();
            $table->string('marital_status', 20)->nullable();
            $table->string('blood_group', 5)->nullable();
            $table->string('spouse_fullname')->nullable();
            $table->string('spouse_dob')->nullable();
            $table->string('spouse_contact')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->date('input_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
