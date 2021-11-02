<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Crop;
use App\District;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;
use App\Region;
use App\Warehouse;
use App\WarehouseCrop;
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

        $warehouse = new Warehouse();
        $warehouse->name = $request->warehouseName;
        $warehouse->region_id = $request->region;
        $warehouse->longitude = $request->longitude;
        $warehouse->latitude = $request->latitude;
        $warehouse->user_id = auth()->user()->id;
        $warehouse->district_id = $request->district;

        $warehouse->type_of_warehouse = $request->type_of_warehouse;
        $warehouse->storage_capacity = $request->storage_capacity. 'cu/ft';
        $warehouse->other_services = $request->other_services;

        $warehouse->other_certification = $request->other_certification;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('img/warehouses/'.$new_name);
            Image::make($image)->resize(450, 320)->save($location,90);
            $warehouse->image = $new_name;
        }
        $certification = '';
        foreach ($request->warehouse_certification as $cert){
            $certification .= $cert . ', ';
        }
        $warehouse->warehouse_certification = $certification;

        $warehouse->save();
//        $warehouse->crops()->sync($request->crops, false);

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


    public function details(Warehouse $warehouse){
        $farmCrops = WarehouseCrop::where('warehouse_id',$warehouse->id)->get();
        return view('user.aggregator.detail',compact('warehouse','farmCrops'));
    }

    public function addCropToWarehouse($id){
        $crops = Crop::all();
        return view('user.aggregator.create-crop',compact('crops','id'));
    }

    public function storeFarmCrop(Request $request)
    {
        $farm = new WarehouseCrop();
        $farm->crop_id = $request->crop;
        $farm->warehouse_id = request('warehouse');
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
        $farm->save();


        $title = "Farm Crop";
        $message = "You added a new farm crop to warehouse successfully!";
        Notification::send(\auth()->user(),new UserNotification($title,$message));

        return redirect()->route('user.view.warehouse.detail', request('warehouse'))
            ->with('success','Farm crop added successfully!');
    }

    public function warehouseCropDetail($id){
        $detail = WarehouseCrop::where('id',$id)->first();
        return view('user.aggregator.view_crop_details',compact('detail'));
    }

    public function openCropSale($id){
        WarehouseCrop::where('id', $id)->update([
            'visible' => 1
        ]);
        $admins = Admin::where('level',1)->get();
        $messageAdmin = "A new warehouse crop is ready for approval!";
        foreach ($admins as $admin){
            Notification::send($admin, new AdminNotification($messageAdmin));
        }
        return redirect()->back()->with('success','Offer updated!');
    }

    public function closeCropSale($id){
        Warehouse::where('id', $id)->update([
            'visible' => 0
        ]);
        $admins = Admin::where('level',1)->get();
        $messageAdmin = "A warehouse crop is removed from marketplace!";
        foreach ($admins as $admin){
            Notification::send($admin, new AdminNotification($messageAdmin));
        }
        return redirect()->back()->with('success','Offer updated!');
    }

}
