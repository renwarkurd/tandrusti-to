<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class RestApiPatientController extends Controller
{
    public function storePatient(Request $request)
    {
        $validated =  $request->validate([
            'code' => ['required', 'string'],
            'code_type' => ['required', 'integer'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'boolean', 'in:0,1'],
            'dob_year' => ['required', 'integer'],
            'dob_month' => ['required', 'integer'],
            'dob_day' => ['required', 'integer'],
            'city_id' => ['nullable', 'integer'],
            'occupation' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'contact_1' => ['nullable', 'string'],
            'contact_2' => ['nullable', 'string'],
            'marital_status' => ['nullable', 'string'],
            'blood_group' => ['nullable', 'string'],
            'spouse_fullname' => ['nullable', 'string'],
            'spouse_dob' => ['nullable', 'string'],
            'spouse_contact' => ['nullable', 'string'],
            'spouse_occupation' => ['nullable', 'string'],
        ]);

        $patient = Patient::create($request->validated());

        return $patient;
    }
}
