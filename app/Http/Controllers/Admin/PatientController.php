<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Patient;

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
    
    public function create() {
        //
        return view('admin.patients.create')
                     ->with('title', 'Create New Patients');
    }
    
    public function store(Request $request)
    {
       $request->validate ([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'gender' => ['required', 'string', 'max:1'],
            'dob' => ['required', 'date'],
            'mobile_no'=>['required', 'string', 'max:10'],
        ]);
      
        $patient = Patient::create($request->all());
        
        User::create([
            'name' => $request['name'],
            'type' => 'patient',
            'type_id' => $patient->id,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        \Session::flash('msg', 'Patient created successfully');

        return redirect('/admin/patients/create');
    }
}
