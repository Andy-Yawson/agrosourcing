<?php

namespace App\Http\Controllers;

use App\Notifications\UserNotification;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('user.profile.profile');
    }


    public function changePassword(Request $request){

        $this->validate($request, [
            'old_password'  => 'required|min:7',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();
        $oldPassword = $request->old_password;
        $newPassword = $request->password;

        if (Hash::check($oldPassword,$user->password)){
            request()->user()->fill([
                'password' => Hash::make($newPassword)
            ])->save();
            $title = "Password";
            $message = "Your password was changed!";
            Notification::send(\auth()->user(),new UserNotification($title,$message));
            request()->session()->flash('success','password changed successfully');

            return redirect(route('user.profile'));
        }else{
            request()->session()->flash('error','Make sure you enter your right old password!');
            return redirect(route('user.profile'));
        }
    }

    public function updateBio(Request $request){
        $this->validate($request, [
            'bio'  => 'required|min:7',
        ]);
        Profile::where('user_id',\auth()->user()->id)->update([
            'bio' => $request->bio
        ]);
        $title = "Bio";
        $message = "You updated your bio successfully!";
        Notification::send(\auth()->user(),new UserNotification($title,$message));
        return redirect(route('user.profile'))->with('success','Bio updated successfully!');
    }

    public function updateDetail(Request $request){
        $this->validate($request,[
            'pic' => 'image|mimes:jpeg,png,jpg|max:2048',
            'phone' => 'required',
        ]);

        if ($request->hasFile('pic')){
            $image = $request->file('pic');
            $new_name = time() . "." . $image->getClientOriginalExtension();
            $location = public_path('img/profile/'.$new_name);
            Image::make($image)->resize(450, 320)->save($location,90);
            Profile::where('user_id',auth()->user()->id)
                ->update([
                    'pic' => $new_name,
                    'company' => $request->company
                ]);
            User::where('id',\auth()->user()->id)->update(['phone'=>$request->phone]);

            $title = "Profile";
            $message = "You updated your profile!";
            Notification::send(\auth()->user(),new UserNotification($title,$message));
            return redirect()->route('user.profile')
                ->with('success','Details was successfully updated');
        }else{
            Profile::where('user_id',auth()->user()->id)->update(['company' => $request->company]);
            User::where('id',\auth()->user()->id)->update(['phone'=>$request->phone]);
            $title = "Profile";
            $message = "You updated your profile!";
            Notification::send(\auth()->user(),new UserNotification($title,$message));
            return redirect()->route('user.profile')
                ->with('success','Details was successfully updated');
        }
    }
}
