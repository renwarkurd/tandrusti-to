<?php

namespace App\Models;

use App\Traits\ForUserId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use HasFactory, SoftDeletes, ForUserId;

    protected $fillable = [
        'user_id', 'patient_id', 'chief_complaint', 'cheif_complaint_duration', 'hopi', 'past_medical_history', 'surgical_history', 'family_history', 'drug_history', 'allergy_history', 'social_history', 'history_gpd_g', 'history_gpd_p', 'history_gpd_a', 'history_gpd_d', 'history_menstrual', 'history_edd', 'history_lmp', 'history_gestational_age', 'note', 'input_date'
    ];
}
