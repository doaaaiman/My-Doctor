<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests\SpecialtyRequest;
use App\Specialty;

class SpecialtyController extends BaseController
{
    public function index(Request $request)
    {
        $q=$request['q'];
         $specialties = Specialty::where('name','like',"%$q%")
                   ->paginate(2)
                   ->appends(['q'=>$q]);
        return view('admin.specialty.index')
        ->with('title','List Specialties')
        ->with('specialties',$specialties);
    }

    public function create()
    {
        return view('admin.specialty.create')
                ->with('title','Create New Speialty');
    }

     public function store(SpecialtyRequest $request)
    {
        // echo 'Hiii';
        $photo= basename($request->flePhoto->store('public/images'));
        $request['photo']=$photo;
        Specialty::create($request->all());
        \Session::flash('msg','s:Specialty Created Successfully');
        return redirect('/admin/specialty/create');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $specialty= Specialty::find($id);
        if(!$specialty){
            \Session::flash('msg','e:Invalid Specialty ID');
            return redirect('/admin/specialty');
        }
        return view('admin.specialty.edit')
        ->with('title','Edit Specialties')
         ->with('specialty',$specialty);
    }

    
    public function update(Request $request, $id)
    {
         $request->validate([
             'name'=>'required|max:50'
        ]);
          $specialty= Specialty::find($id);
         if($request->hasFile('flePhoto')){
            $photo = basename($request->flePhoto->store('public/images'));
            $specialty->photo = $photo;
        }
         $specialty->update($request->all());
         \Session::flash('msg','s:Specialty Updated Successfully');
         return redirect('/admin/specialty');
    }

    public function destroy($id)
    {
         $specialty= Specialty::find($id);
         $specialty->delete();
        \Session::flash('msg','s:Specialty Deleted Successfully');
        return redirect('/admin/specialty');
    }
}
