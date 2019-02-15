<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Post;
use App\Doctor;
use App\Http\Requests\PostRequest;

class PostController extends BaseController
{
    public function index(Request $request)
    {
        
         $doctor = \Auth::user();
        //dd($user->id);
        $q = $request['q'];
        $active = $request['active'];
        $items = Post::whereRaw('true');
        
         $items=$items->where('users_id',$doctor->id); 
         //dd($items);
        if($q)
            $items->whereRaw('(title like ? )',["%$q%"]);

        if($active!='')
            $items->where('active',$active);

        $items = $items->paginate(10)
            ->appends(['q'=>$q, 'active'=>$active]);

        return view('doctor.post.index')
            ->with('title','Manage Posts')
            ->with('items',$items);
    
    }

    public function create()
    {
        return view('doctor.post.create')
                ->with('title','Create New Post');
    }
    
    public function store(PostRequest $request)
    {
       // dd($request);
        $user = \Auth::user();
        $photo = '';
        if($request->hasFile('flePhoto')){
            $photo = basename($request->flePhoto->store('public/images'));
           // dd($photo);
        }
        else{
            \Session::flash('msg','e:You must select Post Image');
            return redirect('/doctor/post/create')->withInput();
        
        }
        $request['image'] = $photo;
       // dd($photo);
       $request['users_id'] = $user->id;
         Post::create($request->all());

        \Session::flash('msg','s:Post Created Successfully');
        return redirect('/doctor/post/create');
    }

    
    public function edit($id)
    {
        $item = Post::find($id);
        if(!$item){
            \Session::flash('msg','e:Invalid Item ID');
            return redirect('/doctor/post');        
        }
        return view('doctor.post.edit')->with('title','Edit Post')
            ->with('item',$item);
    }

    
    public function update($id, PostRequest $request)
    {
        $item = Article::find($id);
        if($request->hasFile('flePhoto')){
            $photo = basename($request->flePhoto->store('public/images'));
            //$item->image = $photo;
            $request['image'] = $photo;
        }
        $item->update($request->all());

        \Session::flash('msg','s:Post Updated Successfully');
        return redirect('/doctor/post');
    }
    public function destroy($id)
    {
        $item = Post::find($id);
        $item->delete();
        \Session::flash('msg','w:Post Deleted Successfully');
        return redirect('/doctor/post');
    }
}
