<?php

namespace App\Http\Controllers;

use App\Post;
use App\Slider;
use App\Specialty;
use App\Doctor;
use App\User;
use App\Comment;

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
    
     public function show($id)
    {
        $post = Post::find($id);
         $comments = Comment::all();
        return view('show-post')
        ->with('title','Show Post Detailes')
          ->with('post',$post)
            ->with('comments', $comments);
    }
    
//     public function comments($id) {
//        $post = Post::find($id);
//        $comment = Comment::all();
//
//        return view('show-post')
//                        ->with('title', 'All Comments')
//                        ->with('post', $post)
//                        ->with('comments', $comment);
//    } 
    
    public function departments()
    {
        $specialties = Specialty::all();
        
        return view('MainPages.departments')
          ->with('specialties',$specialties);
    }
    
    public function doctors()
    {
        $doctors = Doctor::all();
        $users = User::where('type','doctor')
                ->where('active',1)
                ->orderBy('id','desc')->take(4)->get();
    
        return view('MainPages.doctors')
          ->with('doctors',$doctors)
                 ->with('users',$users);
    }
    
    
}
