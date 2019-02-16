<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends BaseController
{
        public function index()
    {
        return view('doctor.home');
        //return "Welcome Doctor (Panel)";
    }
       
    public function changePassword()
    {
        return view('doctor.home.changepassword')
            ->with('title','Change Password');
    }
    public function postChangePassword(Request $request)
    {
        $request->validate([
            'password'=>'required',
            'newpassword'=>'required|min:6|confirmed'
        ]);

        $user = \Auth::user();//logged in user
        if(Hash::check($request['password'], $user->password)){

            //تغيير كلمة المرور
            $user->password = Hash::make($request['newpassword']);
            $user->save();

            //$user->notify(new PasswordChangedNotification($user));

            \Session::flash('msg','s: Password Changed Successfully');
        }
        else{
            \Session::flash('msg','e:Invalid Current Password');
        }
        return redirect('/doctor/home/changepassword'); 
    }
    
    
}
