<?php

namespace App\Http\Controllers;

use App\Models\Patient;

class ViewPatientController extends Controller
{
    public function show($code)
    {
        $patient = Patient::query()
            ->with([
                'histories',
                'diagnoses',
                'operations',
                'medications',
                'physiotherapies',
                'laboratoryResults',
                'radiologyResults',
                'generalNotes',
            ])
            ->where('code', $code)
            ->firstOrFail();

        return $patient;
    }
}
