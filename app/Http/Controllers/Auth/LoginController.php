<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','userLogout']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'  => 'required',
            'password' => 'required|min:6'
        ]);

        if($this->checkIsPhone($request->email)){
            $user = User::where('phone',$request->email)->first();
        }else{
            $user = User::where('email',$request->email)->first();
        }

        if ($user){
            if ($user->status == 0){
                return redirect()->back()
                    ->withInput($request->only('email','remember'))
                    ->with('error','Your account has been suspended');
            }elseif ($user->status == 2){
                return redirect()->back()
                    ->withInput($request->only('email','remember'))
                    ->with('error','Your account is verified and waiting for admin approval');
            }else{
                if ($user->email_verified == 0){
                    return redirect()->back()
                        ->withInput($request->only('email','remember'))
                        ->with('error','Please visit your email '.$request->email.' to activate your account');
                }
            }
        }else{
            return redirect()->back()
                ->withInput($request->only('email','remember'))
                ->with('error','Sorry, you do not have an account with us.');
        }

        if (Hash::check($request->password,$user->password)){
            Auth::login($user,$request->remember);
            if ($request->redirect_url){
                return redirect()->to(urldecode($request->redirect_url));
            }else{
                return redirect()->intended(route('user.welcome'));
            }
        }else{
            return redirect()->back()
                ->withInput($request->only('email','remember'))
                ->with('error','Sorry, you entered a wrong password!');
        }
    }

    public function userLogout()
    {
        User::where('uuid',\auth()->user()->uuid)
            ->update(['updated_at' => now()]);

        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }

    public function checkIsPhone($phone){
        return is_numeric($phone);
    }
}
