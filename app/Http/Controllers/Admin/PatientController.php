<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PatientController extends BaseController
{
   public function index() {

        $q = request()['q'];
        $active = request()['active'];

        $patient='patient';

        $users = User::where('type',$patient);

        //dd($users);
        if ($q)
            $users->whereRaw('(name like ? or email like ? )', ["%$q%", "%$q%"]);
        if ($active != "")
            $users->where('active', $active);

        $users = $users->paginate(5)
                ->appends(['q' => $q, 'active' => $active]);

        return view('admin.patients.index')
                        ->with('title', 'PAtients Management')
                        ->with('users', $users);
    }
}
