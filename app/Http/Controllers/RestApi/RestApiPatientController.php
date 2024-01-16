<?php

namespace App\Http\Controllers\RestApi;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use App\Models\GeneralNote;
use App\Models\History;
use App\Models\LaboratoryResult;
use App\Models\Medication;
use App\Models\Operation;
use App\Models\Patient;
use App\Models\Physiotherapy;
use App\Models\RadiologyResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestApiPatientController extends Controller
{
    public function show($code)
    {
        $patient = Patient::query()
            ->with([
                'codeType',
                'city',
                'histories.user',
                'diagnosis.user',
                'operations.user',
                'medications.user',
                'physiotherapies.user',
                'laboratoryResults.user',
                'radiologyResults.user',
                'generalNotes.user',
            ])
            ->where('code', $code)
            ->where('user_id', auth()->user()->id)
            ->firstOrFail();

        return $patient;
    }

    public function storePatient(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'string'],
            'code_type' => ['required', 'integer'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'in:0,1'],
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

        $validated['input_date'] = date('Y-m-d');

        $patient = Patient::create($validated);

        return $patient;
    }

    public function storeHistory(Request $request)
    {
        $validated = $request->validate([
            'patient' => ['required', 'array'],
            'patient.code' => ['required', 'integer'],
            'patient.code_type' => ['required', 'integer'],
            'patient.first_name' => ['required', 'string'],
            'patient.middle_name' => ['required', 'string'],
            'patient.last_name' => ['required', 'string'],
            'patient.gender' => ['required', 'in:0,1'],
            'patient.dob_year' => ['required', 'integer'],
            'patient.dob_month' => ['required', 'integer'],
            'patient.dob_day' => ['required', 'integer'],
            'patient.city_id' => ['nullable', 'integer'],
            'patient.occupation' => ['nullable', 'string'],
            'patient.address' => ['nullable', 'string'],
            'patient.contact_1' => ['nullable', 'string'],
            'patient.contact_2' => ['nullable', 'string'],
            'patient.marital_status' => ['nullable', 'string'],
            'patient.blood_group' => ['nullable', 'string'],
            'patient.spouse_fullname' => ['nullable', 'string'],
            'patient.spouse_dob' => ['nullable', 'string'],
            'patient.spouse_contact' => ['nullable', 'string'],
            'patient.spouse_occupation' => ['nullable', 'string'],

            'chief_complaint' => ['nullable', 'string'],
            'cheif_complaint_duration' => ['nullable', 'string'],
            'hopi' => ['nullable', 'string'],
            'past_medical_history' => ['nullable', 'string'],
            'surgical_history' => ['nullable', 'string'],
            'family_history' => ['nullable', 'string'],
            'drug_history' => ['nullable', 'string'],
            'allergy_history' => ['nullable', 'string'],
            'social_history' => ['nullable', 'string'],
            'history_gpd_g' => ['nullable', 'integer'],
            'history_gpd_p' => ['nullable', 'integer'],
            'history_gpd_a' => ['nullable', 'integer'],
            'history_gpd_d' => ['nullable', 'integer'],
            'history_menstrual' => ['nullable', 'string'],
            'history_edd' => ['nullable', 'date'],
            'history_lmp' => ['nullable', 'date'],
            'history_gestational_age' => ['nullable', 'string'],
            'note' => ['nullable', 'string'],
        ]);

        $patient = Patient::where('code', $validated['patient']['code'])->where('code_type', $validated['patient']['code_type'])->first();
        if (!$patient) {
            $patient = $this->storePatient($request);
        }

        $validated['patient_id'] = $patient->id;
        $validated['input_date'] = date('Y-m-d');

        $history = History::create($validated);

        return $history;
    }

    public function storeOperation(Request $request)
    {
        $validated = $request->validate([
            'patient' => ['required', 'array'],
            'patient.code' => ['required', 'integer'],
            'patient.code_type' => ['required', 'integer'],
            'patient.first_name' => ['required', 'string'],
            'patient.middle_name' => ['required', 'string'],
            'patient.last_name' => ['required', 'string'],
            'patient.gender' => ['required', 'in:0,1'],
            'patient.dob_year' => ['required', 'integer'],
            'patient.dob_month' => ['required', 'integer'],
            'patient.dob_day' => ['required', 'integer'],
            'patient.city_id' => ['nullable', 'integer'],
            'patient.occupation' => ['nullable', 'string'],
            'patient.address' => ['nullable', 'string'],
            'patient.contact_1' => ['nullable', 'string'],
            'patient.contact_2' => ['nullable', 'string'],
            'patient.marital_status' => ['nullable', 'string'],
            'patient.blood_group' => ['nullable', 'string'],
            'patient.spouse_fullname' => ['nullable', 'string'],
            'patient.spouse_dob' => ['nullable', 'string'],
            'patient.spouse_contact' => ['nullable', 'string'],
            'patient.spouse_occupation' => ['nullable', 'string'],

            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $patient = Patient::where('code', $validated['patient']['code'])->where('code_type', $validated['patient']['code_type'])->first();
        if (!$patient) {
            $patient = $this->storePatient($request);
        }

        $validated['patient_id'] = $patient->id;
        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $operation = Operation::create($validated);

        return $operation;
    }

    public function storeDiagnosis(Request $request)
    {
        $validated = $request->validate([
            'patient' => ['required', 'array'],
            'patient.code' => ['required', 'integer'],
            'patient.code_type' => ['required', 'integer'],
            'patient.first_name' => ['required', 'string'],
            'patient.middle_name' => ['required', 'string'],
            'patient.last_name' => ['required', 'string'],
            'patient.gender' => ['required', 'in:0,1'],
            'patient.dob_year' => ['required', 'integer'],
            'patient.dob_month' => ['required', 'integer'],
            'patient.dob_day' => ['required', 'integer'],
            'patient.city_id' => ['nullable', 'integer'],
            'patient.occupation' => ['nullable', 'string'],
            'patient.address' => ['nullable', 'string'],
            'patient.contact_1' => ['nullable', 'string'],
            'patient.contact_2' => ['nullable', 'string'],
            'patient.marital_status' => ['nullable', 'string'],
            'patient.blood_group' => ['nullable', 'string'],
            'patient.spouse_fullname' => ['nullable', 'string'],
            'patient.spouse_dob' => ['nullable', 'string'],
            'patient.spouse_contact' => ['nullable', 'string'],
            'patient.spouse_occupation' => ['nullable', 'string'],

            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $patient = Patient::where('code', $validated['patient']['code'])->where('code_type', $validated['patient']['code_type'])->first();
        if (!$patient) {
            $patient = $this->storePatient($request);
        }

        $validated['patient_id'] = $patient->id;
        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $diagnosis = Diagnosis::create($validated);

        return $diagnosis;
    }

    public function storeMedication(Request $request)
    {
        $validated = $request->validate([
            'patient' => ['required', 'array'],
            'patient.code' => ['required', 'integer'],
            'patient.code_type' => ['required', 'integer'],
            'patient.first_name' => ['required', 'string'],
            'patient.middle_name' => ['required', 'string'],
            'patient.last_name' => ['required', 'string'],
            'patient.gender' => ['required', 'in:0,1'],
            'patient.dob_year' => ['required', 'integer'],
            'patient.dob_month' => ['required', 'integer'],
            'patient.dob_day' => ['required', 'integer'],
            'patient.city_id' => ['nullable', 'integer'],
            'patient.occupation' => ['nullable', 'string'],
            'patient.address' => ['nullable', 'string'],
            'patient.contact_1' => ['nullable', 'string'],
            'patient.contact_2' => ['nullable', 'string'],
            'patient.marital_status' => ['nullable', 'string'],
            'patient.blood_group' => ['nullable', 'string'],
            'patient.spouse_fullname' => ['nullable', 'string'],
            'patient.spouse_dob' => ['nullable', 'string'],
            'patient.spouse_contact' => ['nullable', 'string'],
            'patient.spouse_occupation' => ['nullable', 'string'],

            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $patient = Patient::where('code', $validated['patient']['code'])->where('code_type', $validated['patient']['code_type'])->first();
        if (!$patient) {
            $patient = $this->storePatient($request);
        }

        $validated['patient_id'] = $patient->id;
        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $medication = Medication::create($validated);

        return $medication;
    }

    public function storePhysiotherapy(Request $request)
    {
        $validated = $request->validate([
            'patient' => ['required', 'array'],
            'patient.code' => ['required', 'integer'],
            'patient.code_type' => ['required', 'integer'],
            'patient.first_name' => ['required', 'string'],
            'patient.middle_name' => ['required', 'string'],
            'patient.last_name' => ['required', 'string'],
            'patient.gender' => ['required', 'in:0,1'],
            'patient.dob_year' => ['required', 'integer'],
            'patient.dob_month' => ['required', 'integer'],
            'patient.dob_day' => ['required', 'integer'],
            'patient.city_id' => ['nullable', 'integer'],
            'patient.occupation' => ['nullable', 'string'],
            'patient.address' => ['nullable', 'string'],
            'patient.contact_1' => ['nullable', 'string'],
            'patient.contact_2' => ['nullable', 'string'],
            'patient.marital_status' => ['nullable', 'string'],
            'patient.blood_group' => ['nullable', 'string'],
            'patient.spouse_fullname' => ['nullable', 'string'],
            'patient.spouse_dob' => ['nullable', 'string'],
            'patient.spouse_contact' => ['nullable', 'string'],
            'patient.spouse_occupation' => ['nullable', 'string'],

            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $patient = Patient::where('code', $validated['patient']['code'])->where('code_type', $validated['patient']['code_type'])->first();
        if (!$patient) {
            $patient = $this->storePatient($request);
        }

        $validated['patient_id'] = $patient->id;
        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $physiotherapy = Physiotherapy::create($validated);

        return $physiotherapy;
    }

    public function storeLaboratory(Request $request)
    {
        $validated = $request->validate([
            'patient_code' => ['required'],
            'files' => ['required', 'array'],
            'files.*' => ['mimetypes:image/jpeg,image/png,application/pdf,application/msword'],
            'input_date' => ['nullable', 'date'],
        ]);

        $patient = Patient::where('code', $validated['patient_code'])->first();
        if (!$patient) {
            return response(['message' => 'This patient is not registered'], 422);
        }

        $validated['patient_id'] = $patient->id;
        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $array = [];

        foreach ($request->file('files') as $fileIndex => $file) {
            $fileObj = $request->file('files')[$fileIndex];
            $filename = date('Ymd') . time() . '_' . $fileObj->getClientOriginalName();
            $path = 'laboratory-attachments';

            $upload = Storage::putFileAs($path, $fileObj, $filename);

            if ($upload) {
                LaboratoryResult::create([
                    'patient_id' => $validated['patient_id'],
                    'filename' => $filename,
                    'input_date' => $validated['input_date'],
                ]);

                $array[] = $filename;
            }
        }

        return $array;
    }

    public function storeRadiology(Request $request)
    {
        $validated = $request->validate([
            'patient_code' => ['required'],
            'files' => ['required', 'array'],
            'files.*' => ['mimetypes:image/jpeg,image/png,application/pdf,application/msword'],
            'input_date' => ['nullable', 'date'],
        ]);

        $patient = Patient::where('code', $validated['patient_code'])->first();
        if (!$patient) {
            return response(['message' => 'This patient is not registered'], 422);
        }

        $validated['patient_id'] = $patient->id;
        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $array = [];

        foreach ($request->file('files') as $fileIndex => $file) {
            $fileObj = $request->file('files')[$fileIndex];
            $filename = date('Ymd') . time() . '_' . $fileObj->getClientOriginalName();
            $path = 'radiology-attachments';

            $upload = Storage::putFileAs($path, $fileObj, $filename);

            if ($upload) {
                RadiologyResult::create([
                    'patient_id' => $validated['patient_id'],
                    'filename' => $filename,
                    'input_date' => $validated['input_date'],
                ]);

                $array[] = $filename;
            }
        }

        return $array;
    }

    public function storeGeneral(Request $request)
    {
        $validated = $request->validate([
            'patient' => ['required', 'array'],
            'patient.code' => ['required', 'integer'],
            'patient.code_type' => ['required', 'integer'],
            'patient.first_name' => ['required', 'string'],
            'patient.middle_name' => ['required', 'string'],
            'patient.last_name' => ['required', 'string'],
            'patient.gender' => ['required', 'in:0,1'],
            'patient.dob_year' => ['required', 'integer'],
            'patient.dob_month' => ['required', 'integer'],
            'patient.dob_day' => ['required', 'integer'],
            'patient.city_id' => ['nullable', 'integer'],
            'patient.occupation' => ['nullable', 'string'],
            'patient.address' => ['nullable', 'string'],
            'patient.contact_1' => ['nullable', 'string'],
            'patient.contact_2' => ['nullable', 'string'],
            'patient.marital_status' => ['nullable', 'string'],
            'patient.blood_group' => ['nullable', 'string'],
            'patient.spouse_fullname' => ['nullable', 'string'],
            'patient.spouse_dob' => ['nullable', 'string'],
            'patient.spouse_contact' => ['nullable', 'string'],
            'patient.spouse_occupation' => ['nullable', 'string'],

            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $patient = Patient::where('code', $validated['patient']['code'])->where('code_type', $validated['patient']['code_type'])->first();
        if (!$patient) {
            $patient = $this->storePatient($request);
        }

        $validated['patient_id'] = $patient->id;
        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $generalNote = GeneralNote::create($validated);

        return $generalNote;
    }
}
