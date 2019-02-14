@extends('admin._dashboard_layout')
@section('title','All Posts')
@section('content')

<div class="col-lg-12 stretch-card">
    
            <form class="row">
                <div class="col-3">
                    <input autofocus value="{{request()['q']}}" type="text" class="form-control"  name="q" placeholder="Enter Here" >
                </div>
                <div class="col-2">
                    <select id="specialties_id" class="form-control" name="users_id" >
                        <option value="">Select Doctor</option>
                        @foreach($doctors as $doctor)
                        <option {{request()['users_id']==$doctor->id?"selected":""}} value='{{$doctor->id}}'>{{$doctor->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" value="Search" class="btn btn-primary" />
                </div>
                <div class="col-5">
                    <a href="/admin/post/create" class="btn btn-success">Create New Post</a>
                </div>
            </form>
    
            <div class="table-responsive">
                @if($posts->count()>0)  
                <br>
                <br>
                 <ul class="list-unstyled">
                     @foreach($posts as $post)
                <li class="media" scop="row">
                    <img src='/storage/images/{{$post->photo}}' class="mr-3 img-fluid img-rounded img-thumbnail" alt="">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1">{{$post->title}}</h5>
                        {{$post->summary}}
                        <br>
                        {{$post->details}}
                        <br>
                        <br>
                        <br>
                                <a href='/admin/post/{{$post->id}}/comments' class="btn btn-info btn-fw">All Comments</a>
                                <a href='/admin/post/{{$post->id}}/edit' class="btn btn-primary btn-fw">Edit</a>
                                <a href='/admin/post/{{$post->id}}/delete' onclick='return confirm("Are you sure?")' class="btn btn-danger btn-fw">Delete</a>
                    </div>
                </li>
                @endforeach
            </ul>
                
                {{$posts->links()}} 
            </div>
    @else
    <div class='alert mt-4 alert-info'>There is no items to show</div>
    @endif



</div>
@endsection


