<?php

namespace App\Http\Controllers;

use App\Models\City;

class BaseDataController extends Controller
{
    public function index()
    {
        return [
            'code_types' => [
                [
                    'id' => 1,
                    'name' => 'کارتی نیشتمانی'
                ],
                [
                    'id' => 2,
                    'name' => 'پاسپۆرت'
                ],
            ],
            'cities' => City::select('id', 'name')->get(),
        ];
    }
}
