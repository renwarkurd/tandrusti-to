<?php

namespace App\Http\Controllers;

use App\Models\City;

class BaseDataController extends Controller
{
    public function index()
    {
        return [
            'code_types' => [
                '1' => 'کارتی نیشتمانی',
                '2' => 'پاسپۆرت'
            ],
            'cities' => City::select('id', 'name')->get(),
        ];
    }
}
