<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Animal;
use App\AnimalInfo;
use App\Crop;
use App\District;
use App\Farm;
use App\FarmCrop;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        ]);

        $code = substr(sha1(time()),0,6);

         $farm = new Farm();
         $farm->longitude = $request->longitude;
         $farm->latitude = $request->latitude;
         $farm->size = $request->size;
         $farm->user_id = auth()->user()->id;
         $farm->region_id = $request->region;
         $farm->district_id = $request->district;
         $farm->community = $request->community;
         $farm->code = $code;
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

    public function viewCrops(Farm $farm){
        $crops = $farm->farmCrops;
        $animals = AnimalInfo::where('farm_id',$farm->id)->get();
        return view('user.farm_crop.view',compact('crops','animals'));
    }

    public function viewCropDetail($id){
        $farmCrop = FarmCrop::where('id',$id)->first();
        return view('user.farm_crop.detail',compact('farmCrop'));
    }

    public function addCrop(){
        $farms = Farm::where('user_id',auth()->user()->id)->get();
        $crops = Crop::all();
        return view('user.farm_crop.create-crop',compact('farms','crops'));
    }

    public function storeFarmCrop(Request $request)
    {
        $this->validate($request,[
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3048'
        ]);

        $farm = new FarmCrop();
        $farm->farm_id = $request->farm;
        $farm->crop_id = $request->crop;
        $farm->price = $request->price;
        $farm->currency = $request->currency;
        $farm->quantity = $request->quantity;
        $farm->package_quantity = $request->package_quantity;
        $farm->visible = 0;
        $farm->crop_variety = $request->crop_variety;
        $farm->moisture_content = $request->moisture_content . 'g/m³';
        $farm->available_start = $request->available_start;
        $farm->available_end = $request->available_end;
        $farm->total_stock_available = $request->total_stock_available;
        $farm->total_stock_available_unit = $request->total_stock_available_unit;
        $farm->minimum_order_quantity = $request->minimum_order_quantity;
        $farm->minimum_order_quantity_unit = $request->minimum_order_quantity_unit;
        $farm->delivery_cost_description = $request->delivery_cost_description;

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

    public function addAnimal(){
        $animals = Animal::all();
        return view('user.farmer.animal_create',compact('animals'));
    }

    public function viewAnimals(){
        $animals = AnimalInfo::where('user_id',auth()->id())->get();
        return view('user.farmer.view_animals',compact('animals'));
    }

    public function storeAnimal(Request $request){
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3048'
        ]);
        $animal = new AnimalInfo();
        $animal->no_of_stock = $request->no_of_stock;
        $animal->min_order_qty = $request->min_order_qty;
        $animal->currency = $request->currency;
        $animal->unit_price = $request->unit_price;
        $animal->delivery_desc = $request->delivery_desc;
        $animal->animal_id = $request->animal_id;
        $animal->farm_id = $request->farm_id;
        $animal->user_id = Auth::id();

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('img/farms/'.$new_name);
            Image::make($image)->resize(450, 320)->save($location,90);
            $animal->image = $new_name;
        }
        $animal->save();
        return redirect()->route('user.farm.animal.view')->with('success','New farm animal added successfully!');
    }

    public function animalOpenForSale(AnimalInfo $animalInfo){
        $animalInfo->status = 1;
        $animalInfo->update();
        return redirect()->back()->with('success','Farm animal open for sale');
    }

    public function animalCloseForSale(AnimalInfo $animalInfo){
        $animalInfo->status = 0;
        $animalInfo->update();
        return redirect()->back()->with('success','Farm animal close for sale');
    }
}
