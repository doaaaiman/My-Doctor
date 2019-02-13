@extends('admin._dashboard_layout')
@section('title',$title)
@section('content')



    <!-- Main Content -->
    <div class="container">
        <form method="post" enctype="multipart/form-data"  action="/admin/menu/{{$item->id}}">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-8">
                  <input autofocus value="{{$item->title}}" type="text" class="form-control" name="title" id="title" placeholder="Title">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="parent_id" class="col-sm-2 col-form-label">Parent</label>
                <div class="col-sm-8">
                    <select name="parent_id" id='parent_id' class="form-control">
                        <option value='0'>No Parent (Top Menu)</option>
                        @foreach($topMenu as $menu)
                            <option {{$item->parent_id==$menu->id?"selected":""}} value='{{$menu->id}}'>{{$menu->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label">URL</label>
                <div class="col-sm-8">
                  <input autofocus value="{{$item->url}}" type="text" class="form-control" name="url" id="url" placeholder="URL">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type='hidden' value='0' name='active'/>
                    <label><input  {{$item->active?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>
                    
                </div>
            </div>
            
            
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Update" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/admin/menu">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection()
