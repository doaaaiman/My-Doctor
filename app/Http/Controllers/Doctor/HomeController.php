<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Controller;

class HomeController extends BaseController
{
   // public function index(){
        public function index()
    {
        return view('doctor.home');
        //return "Welcome Doctor (Panel)";
    }
       
    //}
    
    
}
