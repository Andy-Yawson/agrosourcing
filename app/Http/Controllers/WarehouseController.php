<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Crop;
use App\District;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;
use App\Region;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\Facades\Image;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $warehouses = Warehouse::where('user_id',auth()->user()->id)->get();
        return view('user.aggregator.view_warehouse',compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $crops = Crop::all();
        $regions = Region::all();
        $districts = District::all();
        return view('user.aggregator.add_warehouse',compact('crops','regions', 'districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'region' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $warehouse = new Warehouse();
        $warehouse->region_id = $request->region;
        $warehouse->longitude = $request->longitude;
        $warehouse->latitude = $request->latitude;
        $warehouse->price = $request->price;
        $warehouse->user_id = auth()->user()->id;
        $warehouse->currency = $request->currency;
        $warehouse->quantity = $request->quantity;
        $warehouse->district_id = $request->district;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('img/warehouses/'.$new_name);
            Image::make($image)->resize(450, 320)->save($location,90);
            $warehouse->image = $new_name;
        }

        $warehouse->save();
        $warehouse->crops()->sync($request->crops, false);

        $title = "Warehouse";
        $message = "You added a warehouse successfully!";
        Notification::send(\auth()->user(),new UserNotification($title,$message));

        $admins = Admin::where('level',1)->get();
        $messageAdmin = "A new warehouse project has been created!";
        foreach ($admins as $admin){
            Notification::send($admin, new AdminNotification($messageAdmin));
        }

        return redirect()->route('user.view.warehouse')
            ->with('success','Warehouse successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        //
    }
}
