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
    public function storePatient(Request $request)
    {
        $request->validate([
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

    public function storeHistory(Request $request)
    {
        $request->validate([
            'patient_id' => ['required', 'integer'],
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

        $history = History::create($request->validated());

        return $history;
    }

    public function storeOperation(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $operation = Operation::create($validated);

        return $operation;
    }

    public function storeDiagnosis(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $diagnosis = Diagnosis::create($validated);

        return $diagnosis;
    }

    public function storeMedication(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $medication = Medication::create($validated);

        return $medication;
    }

    public function storePhysiotherapy(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $physiotherapy = Physiotherapy::create($validated);

        return $physiotherapy;
    }

    public function storeLaboratory(Request $request)
    {
        $validated = $request->validate([
            'files' => ['required', 'array'],
            'files.*' => ['mimetypes:image/jpeg,image/png,application/pdf'],
            'patient_id' => ['required', 'integer'],
            'input_date' => ['nullable', 'date'],
        ]);

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
            'files' => ['required', 'array'],
            'files.*' => ['mimetypes:image/jpeg,image/png,application/pdf'],
            'patient_id' => ['required', 'integer'],
            'input_date' => ['nullable', 'date'],
        ]);

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
            'patient_id' => ['required', 'integer'],
            'description' => ['required', 'string'],
            'input_date' => ['nullable', 'date'],
        ]);

        $validated['input_date'] = $validated['input_date'] ?? date('Y-m-d');

        $generalNote = GeneralNote::create($validated);

        return $generalNote;
    }
}
