<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function places()
    {
        $places = Place::orderBy('place_name', 'ASC');
        return datatables()->of($places)
            ->addColumn('action', 'places.buttons')
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();
    }
}
