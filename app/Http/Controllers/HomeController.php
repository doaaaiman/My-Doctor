<?php

namespace App\Http\Controllers;

use App\Post;
use App\Slider;

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
        ->with('title','Medino')
          ->with('posts',$posts)
           ->with('sliders',$sliders);
    }
}
