<?php

namespace App\Models;

use App\Traits\ForUserId;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes, ForUserId;

    // code_type choices
    public const NATIONAL_ID = 'کارتی نیشتیمانی';
    public const PASSPORT = 'پاسپۆرت';

    public $fillable = [
        'user_id',
        'code',
        'code_type',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob_year',
        'dob_month',
        'dob_day',
        'city_id',
        'occupation',
        'address',
        'contact_1',
        'contact_2',
        'marital_status',
        'blood_group',
        'spouse_fullname',
        'spouse_dob',
        'spouse_contact',
        'spouse_occupation',
    ];

    protected $appends = [
        'full_name',
        'calculated_age',
        'dob',
        // 'spouse_dob_year',
        // 'spouse_dob_month',
        // 'spouse_dob_day',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->first_name} {$this->middle_name} {$this->last_name}",
        );
    }

    protected function dob(): Attribute
    {
        return Attribute::make(
            get: fn () => "{$this->dob_year}-{$this->dob_month}-{$this->dob_day}",
        );
    }
    protected function calculatedAge(): Attribute
    {
        $dob = "{$this->dob_year}-{$this->dob_month}-{$this->dob_day}";

        $ageCalc_dateNow = Carbon::parse($dob)->diff(Carbon::now());

        return Attribute::make(
            get: fn () => [
                'y' => $ageCalc_dateNow->y,
                'm' => $ageCalc_dateNow->m,
                'd' => $ageCalc_dateNow->d,
            ],
        );
    }
}
