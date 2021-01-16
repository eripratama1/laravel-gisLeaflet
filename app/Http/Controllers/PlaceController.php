<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Place $place)
    {
        return view('places.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'place_name' => 'required|min:3',
            'address'   => 'required|min:10',
            'description' => 'required|min:10',
            'longitude'  => 'required',
            'latitude'  => 'required'
        ]);
        Place::create([
            'place_name' => $request->place_name,
            'address'  => $request->address,
            'description' => $request->description,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        notify()->success('Place has been created');
        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view('places.detail', [
            'place' => $place,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('places.edit', [
            'place' => $place,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $this->validate($request, [
            'place_name' => 'required|min:3',
            'address'   => 'required|min:10',
            'description' => 'required|min:10',
            'longitude'  => 'required',
            'latitude'  => 'required'
        ]);

        $place->update([
            'place_name' => $request->place_name,
            'address'  => $request->address,
            'description' => $request->description,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        notify()->info('Place has been updated');
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();
        notify()->warning('Place has been deleted');
        return redirect()->route('places.index');
    }

    public function sampleMap()
    {
        return view('sample');
    }
}
