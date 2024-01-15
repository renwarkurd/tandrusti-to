<?php

namespace App\Http\Controllers;

use App\Models\Patient;

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
}
