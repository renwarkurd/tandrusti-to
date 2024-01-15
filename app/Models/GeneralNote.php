<?php

namespace App\Models;

use App\Traits\ForUserId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralNote extends Model
{
    use HasFactory, SoftDeletes, ForUserId;

    protected $fillable = [
        'user_id', 'patient_id', 'description', 'input_date'
    ];
}
