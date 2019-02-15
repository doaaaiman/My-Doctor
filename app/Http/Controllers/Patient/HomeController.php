<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class HomeController extends BaseController
{
    public function index(){
        return "Welcome Patient (Panel)";
    }
    
    
    public function postAddComment(Request $request,$id) {
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
    
//      public function comments($id) {
//        $post = Post::find($id);
//        $comment = Comment::all();
//
//        return view('show-post')
//                        ->with('title', 'All Comments')
//                        ->with('post', $post)
//                        ->with('comments', $comment);
//    } 
}
