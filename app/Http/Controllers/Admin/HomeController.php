<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends BaseController
{
    public function changePassword()
    {
        $user = User::find(1);
        //$user->notify(new PasswordChangedNotification($user));

        return view('admin.home.changepassword')
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
        return redirect('/admin/home/changepassword'); 
    }
}
