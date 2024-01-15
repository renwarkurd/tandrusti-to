<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseDataController extends Controller
{
    public function index()
    {
        return [
            'code_types' => [
                '1' => 'کارتی نیشتمانی',
                '2' => 'پاسپۆرت'
            ],
        ];
    }
}
