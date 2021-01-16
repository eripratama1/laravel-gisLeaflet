<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Place as PlaceResource;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{

    public function index(Request $request)
    {
        $places = Place::all();

        $geoJSONdata = $places->map(function ($place) {
            return [
                'type' => 'Feature',
                'properties' => new PlaceResource($place),
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $place->longitude,
                        $place->latitude,

                    ],
                ],
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
