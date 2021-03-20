<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Notifications\NewUser;
use App\Notifications\NewUserAdmin;
use App\Profile;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('auth.register',compact('roles'));
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'f_name' => 'required|min:3|max:255',
            'l_name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:9|max:10',
            'password' => 'required|min:6|confirmed'
        ]);

        $token = str_shuffle(md5(time()));

        $user = new User();
        $user->name = $request->f_name . " " . $request->l_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = 1;
        $user->verified_token = $token;
        $user->uuid = Str::uuid();
        $user->save();

        $user->roles()->sync($request->roles,false);

        Profile::create([
            'pic' => 'avatar.png',
            'bio' => null,
            'company' => null,
            'user_id' => $user->id
        ]);

        $user->notify(new NewUser($user->name,$token));

        $admins = Admin::all();
        foreach ($admins as $admin){
            $admin->notify(new NewUserAdmin());
        }
        Mail::to($user->email)->send(new RegisterMail($token,$user->name));

        return redirect()->intended(route('user.login'))
            ->with('success','Your account was created, visit your email to verify your account.');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function verifyUser($token){
        $user = User::where('verified_token',$token)->first();
        if (!$user){
            return redirect()->intended(route('user.login'))
                ->with('error','Visit your email to click on the link sent to you.');
        }
        User::where('uuid',$user->uuid)
            ->update([
                    'email_verified'=> 1,
                    'verified_token' => '',
                    'status' => 2
                ]);

        return redirect()->intended(route('user.login'))
            ->with('success','Your account was activated successfully, Waiting for admin to approve you!');
    }
}
