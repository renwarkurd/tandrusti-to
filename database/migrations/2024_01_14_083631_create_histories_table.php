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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('patient_id')->constrained();
            $table->string('chief_complaint')->nullable();
            $table->string('cheif_complaint_duration')->nullable();
            $table->text('hopi')->nullable();
            $table->text('past_medical_history')->nullable();
            $table->text('surgical_history')->nullable();
            $table->text('family_history')->nullable();
            $table->text('drug_history')->nullable();
            $table->text('allergy_history')->nullable();
            $table->text('social_history')->nullable();
            $table->integer('history_gpd_g')->nullable();
            $table->integer('history_gpd_p')->nullable();
            $table->integer('history_gpd_a')->nullable();
            $table->integer('history_gpd_d')->nullable();
            $table->text('history_menstrual')->nullable();
            $table->date('history_edd')->nullable();
            $table->date('history_lmp')->nullable();
            $table->string('history_gestational_age')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('histories');
    }
};
