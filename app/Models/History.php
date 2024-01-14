<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'patient_id',
        'provider_id',
        'chief_complaint',
        'hopi',
        'surgical_history',
        'family_history',
        'drug_history',
        'allergy_history',
        'note',
    ];
}
