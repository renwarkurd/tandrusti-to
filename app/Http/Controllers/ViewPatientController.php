<?php

namespace App\Http\Controllers;

use App\Models\LaboratoryResult;
use App\Models\Patient;
use App\Models\RadiologyResult;
use Illuminate\Support\Facades\Storage;

class ViewPatientController extends Controller
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
            ->firstOrFail();

        return $patient;
    }

    public function showLaboratoryAttachment($patientId, $fileName)
    {
        LaboratoryResult::where('patient_id', $patientId)->where('filename', $fileName)->firstOrFail();

        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileType = strtolower($fileType);
        $header = null;

        switch ($fileType) {
            case 'jpg':
                $header = ['Content-type' => 'image/jpeg'];
                break;
            case 'jpeg':
                $header = ['Content-type' => 'image/jpeg'];
                break;
            case 'png':
                $header = ['Content-type' => 'image/png'];
                break;
            case 'pdf':
                $header = ['Content-type' => 'application/pdf'];
                break;
            case 'doc':
                $header = ['Content-type' => 'application/msword'];
                break;
        }

        if (!$header) return;

        $file = Storage::get('laboratory-attachments/' . $fileName);

        return response($file, 200, $header);
    }

    public function showRadiologyAttachment($patientId, $fileName)
    {
        RadiologyResult::where('patient_id', $patientId)->where('filename', $fileName)->firstOrFail();

        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $fileType = strtolower($fileType);
        $header = null;

        switch ($fileType) {
            case 'jpg':
                $header = ['Content-type' => 'image/jpeg'];
                break;
            case 'jpeg':
                $header = ['Content-type' => 'image/jpeg'];
                break;
            case 'png':
                $header = ['Content-type' => 'image/png'];
                break;
            case 'pdf':
                $header = ['Content-type' => 'application/pdf'];
                break;
            case 'doc':
                $header = ['Content-type' => 'application/msword'];
                break;
        }

        if (!$header) return;

        $file = Storage::get('radiology-attachments/' . $fileName);

        return response($file, 200, $header);
    }
}
