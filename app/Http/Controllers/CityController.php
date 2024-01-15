<?php

namespace App\Http\Controllers;

class CityController extends Controller
{
    public function list()
    {
        return City::select('id', 'name')->get();
    }
}
