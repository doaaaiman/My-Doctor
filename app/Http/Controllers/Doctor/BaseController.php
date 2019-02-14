<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('doctorType');
    }
    
     public function getDetails()
    {
       $user = \Auth::user();
       $type=\Auth::user()->type;
       $type_id=\Auth::user()->type_id;
       
      // if($type==doctor){
           $doctor = Doctor::where('id',$type_id);
           $mobile= $doctor->mobile_no;
           $specialty= $doctor->specialties_id;
     //  }
       
        return $mobile
           ->with('specialty',$specialty);
        //dd($mobile/$specialty);
    } 
}
