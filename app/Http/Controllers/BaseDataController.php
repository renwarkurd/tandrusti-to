<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CodeType;

class BaseDataController extends Controller
{
    public function index()
    {
        return [
            'code_types' => CodeType::select('id', 'name')->get(),
            'cities' => City::select('id', 'name')->get(),
        ];
    }
}
