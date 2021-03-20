<?php

namespace App\Http\Controllers;

use App\Admin;
use App\District;
use App\Notifications\AdminNotification;
use App\Notifications\UserNotification;
use App\ProcessingProduct;
use App\Product;
use App\Region;
use App\Waste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
        $products = Product::where('user_id',auth()->user()->id)->get();
        return view('user.product.view',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $wastes = Waste::all();
        $regions = Region::all();
        $districts = District::all();
        return view('user.product.add',compact('wastes','regions','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->business;
        $product->region_id = $request->region;
        $product->longitude = $request->longitude;
        $product->latitude = $request->latitude;
        $product->user_id = auth()->user()->id;
        $product->district_id = $request->district;

        $product->save();

        $title = "Product";
        $message = "You added a new processing site successfully!";
        Notification::send(\auth()->user(),new UserNotification($title,$message));

        $admins = Admin::where('level',1)->get();
        $messageAdmin = "A new processing site has been added!";
        foreach ($admins as $admin){
            Notification::send($admin, new AdminNotification($messageAdmin));
        }

        return redirect()->route('user.view.site')
            ->with('success','Product was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     */
    public function destroy(Product $product)
    {
        //
    }

    public function createProduct(){
        $products = Product::all();
        return view('user.product.add-product',compact('products'));
    }

    public function storeProduct(Request $request){
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $product = new ProcessingProduct();
        $product->product_id = $request->product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->materials = $request->materials;
        $product->wastes = $request->wastes;
        $product->currency = $request->currency;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $new_name = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('img/products/'.$new_name);
            Image::make($image)->resize(450, 320)->save($location,90);
            $product->image = $new_name;
        }
        $product->save();

        $title = "Product";
        $message = "You added a new product successfully!";
        Notification::send(\auth()->user(),new UserNotification($title,$message));

        $admins = Admin::where('level',1)->get();
        $messageAdmin = "A new product has been added!";
        foreach ($admins as $admin){
            Notification::send($admin, new AdminNotification($messageAdmin));
        }

        return redirect()->route('user.view.site')
            ->with('success','Product was created successfully!');
    }

    public function viewProducts(Product $product){
        $products = $product->processingProducts;
        return view('user.product.view-product',compact('products'));
    }
}
