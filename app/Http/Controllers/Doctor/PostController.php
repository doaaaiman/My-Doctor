<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request['q'];
        $active = $request['active'];
        $items = Post::whereRaw('true');

        if($q)
            $items->whereRaw('(title like ? )',["%$q%"]);

        if($active!='')
            $items->where('active',$active);

        $items = $items->paginate(10)
            ->appends(['q'=>$q, 'active'=>$active]);

        return view('admin.article.index')
            ->with('title','Manage Posts')
            ->with('items',$items);
    }

    public function create()
    {
        return view('admin.article.create')->with('title','Create New Post');
    }
    public function store(PostRequest $request)
    {
        $photo = '';
        if($request->hasFile('flePhoto')){
            $photo = basename($request->flePhoto->store('public/images'));
           // dd($photo);
        }
        else{
            \Session::flash('msg','e:You must select Post Image');
            return redirect('/admin/article/create')->withInput();
        
        }
        $request['image'] = $photo;
       // dd($photo);
         Post::create($request->all());

        \Session::flash('msg','s:Post Created Successfully');
        return redirect('/admin/article/create');
    }

    
    public function edit($id)
    {
        $item = Post::find($id);
        if(!$item){
            \Session::flash('msg','e:Invalid Item ID');
            return redirect('/admin/article');        
        }
        return view('admin.article.edit')->with('title','Edit Post')
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
        return redirect('/admin/article');
    }
    public function destroy($id)
    {
        $item = Post::find($id);
        $item->delete();
        \Session::flash('msg','w:Post Deleted Successfully');
        return redirect('/admin/article');
    }
}
