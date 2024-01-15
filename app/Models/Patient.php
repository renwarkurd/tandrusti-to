<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\History;
use App\Models\CodeType;
use App\Models\Diagnosis;
use App\Models\Operation;
use App\Traits\ForUserId;
use App\Models\Medication;
use App\Models\GeneralNote;
use App\Models\Physiotherapy;
use App\Models\RadiologyResult;
use App\Models\LaboratoryResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory, SoftDeletes, ForUserId;

    // code_type choices
    public const NATIONAL_ID = 'کارتی نیشتیمانی';
    public const PASSPORT = 'پاسپۆرت';

    public $fillable = [
        'user_id', 'code', 'code_type', 'first_name', 'middle_name', 'last_name', 'gender', 'dob_year', 'dob_month', 'dob_day', 'city_id', 'occupation', 'address', 'contact_1', 'contact_2', 'marital_status', 'blood_group', 'spouse_fullname', 'spouse_dob', 'spouse_contact', 'spouse_occupation', 'input_date'
    ];

    protected $appends = [
        'full_name',
        'calculated_age',
        'dob',
    ];

    // Relations
    public function codeType()
    {
        return $this->belongsTo(CodeType::class, 'code_type');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function diagnosis()
    {
        return $this->hasMany(Diagnosis::class);
    }

    public function operations()
    {
        return $this->hasMany(Operation::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function physiotherapies()
    {
        return $this->hasMany(Physiotherapy::class);
    }

    public function laboratoryResults()
    {
        return $this->hasMany(LaboratoryResult::class);
    }

    public function radiologyResults()
    {
        return $this->hasMany(RadiologyResult::class);
    }

    public function generalNotes()
    {
        return $this->hasMany(GeneralNote::class);
    }

    // Attributes
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
