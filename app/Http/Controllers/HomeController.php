<?php

namespace App\Http\Controllers;

use App\Post;
use App\Slider;
use App\Specialty;
use App\Doctor;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
    
    public function welcome()
    {
        $posts = Post::where('active',1)->orderBy('id','desc')->take(3)->get();
       $sliders = Slider::where('active',1)->orderBy('id','desc')->take(5)->get();
        
        return view('welcome')
        ->with('title','My Doctor')
          ->with('posts',$posts)
           ->with('sliders',$sliders);
    }
    
    public function departments()
    {
        $specialties = Specialty::all();
        
        return view('MainPages.departments')
        ->with('title','Departments')
          ->with('specialties',$specialties);
    }
    
    public function doctors()
    {
        $doctors = Doctor::all();
        $users = User::where('type','doctor')
                ->where('active',1)
                ->orderBy('id','desc')->take(4)->get();
    
        return view('MainPages.doctors')
        ->with('title','Doctors')
          ->with('doctors',$doctors)
                 ->with('users',$users);
    }
    
    
}
