<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout','userLogout']);
    }

    public function userLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function userLogin(){
        return view('admin.auth.login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email'  => 'required|email',
            'password' => 'required|min:7'
        ]);

        $status = Admin::where('email',$request->email)
            ->where('status',0)
            ->first();
        if ($status){
            return redirect()
                ->back()
                ->withInput($request->only('email','remember'))
                ->with('error','Your account has been suspended');
        }

        if(Auth::guard('admin')
            ->attempt([
                'email' => $request->email,
                'password' => $request->password],
                $request->remember)){

            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'))
            ->with('error','Invalid email or password!');
    }
}
