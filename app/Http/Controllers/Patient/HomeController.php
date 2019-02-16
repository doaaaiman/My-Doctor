<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends BaseController {

       public function index()
    {
        return view('patient.home');
        //return "Welcome Patient (Panel)";
    }

    public function postAddComment(Request $request, $id) {
        $user = \Auth::user();

        $request->validate([
            'body' => 'required|max:250'
        ]);
        $request['users_id'] = $user->id;
        $request['posts_id'] = $id;
        Comment::create($request->all());
        \Session::flash('msg', 's:Comment Created Successfully');
        return redirect('/');
    }

    public function changePassword() {
       
        return view('patient.home.changepassword')
                        ->with('title', 'Change Password');
    }

    public function postChangePassword(Request $request) {
        $request->validate([
            'password' => 'required',
            'newpassword' => 'required|min:6|confirmed'
        ]);

        $user = \Auth::user(); //logged in user
        if (Hash::check($request['password'], $user->password)) {

            //تغيير كلمة المرور
            $user->password = Hash::make($request['newpassword']);
            $user->save();

            //$user->notify(new PasswordChangedNotification($user));

            \Session::flash('msg', 's: Password Changed Successfully');
        } else {
            \Session::flash('msg', 'e:Invalid Current Password');
        }
        return redirect('/patient/home/changepassword');
    }

}
