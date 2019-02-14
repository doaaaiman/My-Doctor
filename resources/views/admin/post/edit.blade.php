@extends('admin._dashboard_layout')
@section('title','Update Post')
@section('content')

<!-- Main Content -->
    <div class="container">
        <form method="post" enctype="multipart/form-data"  action="/admin/post/{{$item->id}}">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-8">
                  <input autofocus value="{{$item->title}}" type="text" class="form-control" name="title" id="title" placeholder="Title">
                </div>
            </div>
            
            <div class="form-group row">
                <label for="summary" class="col-sm-2 col-form-label">Summary</label>
                <div class="col-sm-8">
                    <textarea rows="4" maxlength="150" class="form-control" name="summary" id="summary" placeholder="Summary">{{$item->summary}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="details" class="col-sm-2 col-form-label">Details</label>
                <div class="col-sm-8">
                    <textarea rows="8" class="form-control" name="details" id="details" placeholder="Details">{{$item->details}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type='hidden' value='0' name='active'/>
                    <label><input  {{$item->active?"checked":""}} type="checkbox" value='1' name='active' id='active' /> Active</label>
                    
                </div>
            </div>
            
            
            <div class="form-group row">
                <label for="flePhoto" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-8">
                    <input type="file" name="flePhoto" />
                    @if($item->image)
                    <div>
                        <img class='img-fluid img-thumbnail' src='{{asset("storage/images/".$item->image)}}' />
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                    <input type="submit" value="Update" class="btn btn-primary" />
                    <a class="btn btn-dark" href="/admin/post">Cancel</a>
                </div>
            </div>
        </form>
    </div>

@endsection


