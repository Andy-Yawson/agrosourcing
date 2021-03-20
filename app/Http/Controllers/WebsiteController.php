<?php

namespace App\Http\Controllers;

use App\Farm;
use App\FarmCrop;
use App\ProcessingProduct;
use App\Product;
use App\Warehouse;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        return view('website.welcome');
    }

    public function about(){
        return view('website.about');
    }

    public function sourcemap(){
        return view('website.sourcemap');
    }

    public function upcycling(){
        return view('website.upcycling');
    }

    public function research(){
        return view('website.research');
    }

    public function contact(){
        return view('website.contact');
    }

    public function postContact(Request $request){
        //return view('website.contact');
        $this->validate($request,[
            'email' => 'required|email',
            'name' => 'required|min:3',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'name' => $request->name,
            'subject' => $request->subject,
            'bodyMessage' => $request->message,
        );

        $headers = "From: ".$request->email . "\r\n" .
            "CC: ".$request->email;
        mail("support@agrosourcing.net",$request->subject,$request->message,$headers);

        return redirect()->route('web.contact')
            ->with('success','Your mail was sent. Thanks for the feedback');
    }

    public function showMarketplace(){

        $farms = FarmCrop::where('visible',2)->get();
        $products = ProcessingProduct::where('visible',2)->get();
        $warehouses = Warehouse::where('visible',2)->get();

        return view('website.marketplace',compact('farms','warehouses','products'));
    }
}
