<?php

namespace App\Http\Controllers;

use App\Region;
use App\Truck;
use App\Trucker;
use Illuminate\Http\Request;

class TruckerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $truckers = Trucker::where('user_id',auth()->user()->id)->get();
        return view('user.trucker.view',compact('truckers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $regions = Region::all();
        $trucks = Truck::all();
        return view('user.trucker.create',compact('regions','trucks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'type' => 'required',
           'capacity' => 'required',
           'location' => 'required',
           'region' => 'required',
        ]);

        Trucker::create([
           'truck_id' => $request->type,
           'capacity' => $request->capacity,
           'location' => $request->location,
           'region_id' => $request->region,
           'unit' => $request->unit,
           'user_id' => auth()->user()->id
        ]);

        return redirect()->route('user.view.trucker')->with('success','Truck added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trucker  $trucker
     */
    public function show(Trucker $trucker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trucker  $trucker
     */
    public function edit(Trucker $trucker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trucker  $trucker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trucker $trucker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trucker  $trucker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trucker $trucker)
    {
        //
    }
}
