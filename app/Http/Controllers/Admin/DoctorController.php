<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Doctor;
use App\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends BaseController {

    public function index() {

        $q = request()['q'];
        $active = request()['active'];

        $doctor = 'doctor';

        $users = User::where('type', $doctor);

        //dd($users);
        if ($q)
            $users->whereRaw('(name like ? or email like ? )', ["%$q%", "%$q%"]);
        if ($active != "")
            $users->where('active', $active);

        $users = $users->paginate(5)
                ->appends(['q' => $q, 'active' => $active]);

        return view('admin.doctors.index')
                        ->with('title', 'Doctors Management')
                        ->with('users', $users);
    }

    public function edit($id) {
        $doctor = Doctor::find($id);
      $specialties = Specialty::all();
        if (!$doctor) {
            \Session::flash('msg', 'w:Invalid Doctor');
            return redirect('/admin/doctors');
        }
        return view('admin.doctors.edit')
                        ->with('title', 'Edit doctor')
                        ->with('doctor', $doctor)
                ->with('specialties',$specialties);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'mobile_no' => 'required|max:10',
            'cv' => 'required',
            'specialties_id' => 'required',
        ]);
        if ($request->hasFile('flePhoto')) {
            $photo = basename($request->flePhoto->store('public/images'));
            $request['photo'] = $photo;
        }
        $doctor = Doctor::find($id);
        
        $doctor->update($request->all());
        \Session::flash('msg', 'Doctor updated successfully');

        return redirect('/admin/doctors');
    }

    public function destroy($id) {
        $doctor = User::find($id);
        $doctor->delete();
        \Session::flash('msg', 'User deleted successfully');
        return redirect('/admin/users');
    }

}
