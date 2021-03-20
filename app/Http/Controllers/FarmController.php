<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Crop;
use App\District;
use App\Farm;
use App\FarmCrop;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\Facades\Image;

class FarmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $farms = Farm::where('user_id',auth()->user()->id)->get();
        return view('user.farmer.view',compact('farms'));
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
        return view('user.farmer.create',compact('crops','regions','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'size' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

         $farm = new Farm();
         $farm->longitude = $request->longitude;
         $farm->latitude = $request->latitude;
         $farm->size = $request->size;
         $farm->user_id = auth()->user()->id;
         $farm->region_id = $request->region;
         $farm->district_id = $request->district;
        $farm->save();


        $title = "Farm";
        $message = "You added a farm successfully!";
        Notification::send(\auth()->user(),new UserNotification($title,$message));

        $admins = Admin::where('level',1)->get();
        $messageAdmin = "A new farm project has been created and waiting approval!";
        foreach ($admins as $admin){
            Notification::send($admin, new AdminNotification($messageAdmin));
        }

        return redirect()->route('user.view.farm')
            ->with('success','Farm added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function show(Farm $farm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Farm $farm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farm  $farm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farm $farm)
    {
        //
    }

    public function viewCrops(Farm $farm){
        $crops = $farm->farmCrops;
        return view('user.farm_crop.view',compact('crops'));
    }

    public function addCrop(){
        $farms = Farm::where('user_id',auth()->user()->id)->get();
        $crops = Crop::all();
        return view('user.farm_crop.create-crop',compact('farms','crops'));
    }

    public function storeFarmCrop(Request $request)
    {
        $this->validate($request,[
            'size' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $farm = new FarmCrop();
        $farm->size = $request->size;
        $farm->farm_id = $request->farm;
        $farm->crop_id = $request->crop;
        $farm->price = $request->price;
        $farm->currency = $request->currency;
        $farm->quantity = $request->quantity;
        $farm->package_quantity = $request->package_quantity;

        if ($request->has('organic')){
            $farm->organic = 1;
        }else{
            $farm->organic = 0;
        }

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('img/farms/'.$new_name);
            Image::make($image)->resize(450, 320)->save($location,90);
            $farm->image = $new_name;
        }
        $farm->save();


        $title = "Farm Crop";
        $message = "You added a farm crop successfully!";
        Notification::send(\auth()->user(),new UserNotification($title,$message));

        $admins = Admin::where('level',1)->get();
        $messageAdmin = "A new farm crop has been created!";
        foreach ($admins as $admin){
            Notification::send($admin, new AdminNotification($messageAdmin));
        }

        return redirect()->route('user.view.farm')
            ->with('success','Farm crop added successfully!');
    }
}
