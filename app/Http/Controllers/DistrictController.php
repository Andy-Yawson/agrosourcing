<?php

namespace App\Http\Controllers;

use App\District;
use App\Region;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getDistricts(){
        $districts = District::all();
        $regions = Region::all();
        return view('admin.district.view',compact('districts','regions'));
    }

    public function addDistricts(Request $request){
        District::create([
            'name' => $request->name,
            'region_id' => $request->region
        ]);

        return redirect()->route('admin.districts')->with('success', 'New district added successfully!');
    }

    public function deleteDistrict(District $district){
        $district->delete();
        return redirect()->route('admin.districts')->with('success','District Deleted');
    }
}
