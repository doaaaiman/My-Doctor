@extends('admin._dashboard_layout')
@section('title','Update Speailty')
@section('content')

 <!-- Main Content -->
    <div class="container">
                  
            <form class="forms-sample" method="post" enctype="multipart/form-data" action="/admin/specialty/{{$specialty->id}}">
                @csrf
                @method('put')
                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-8">
                  <input autofocus value="{{$specialty->name}}" type="text" class="form-control" name="name" id="name" placeholder="Specailty name">
                </div>
            </div>
                @if($specialty->photo)
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-5">
                        <img class="img-fluid img-rounded img-thumbnail" src='/storage/images/{{$specialty->photo}}' />
                    </div>
                </div>
                @endif
                <div class="form-group row">
                    <label for="flePhoto" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-8">
                        <input type="file" name="flePhoto" />
                    </div>
                </div>
                <div class="form-group row">
                <div class="col-sm-8 offset-sm-2">
                <button type="submit" class="btn btn-success mr-2">Update</button>
                <a href="/admin/specialty" class="btn btn-dark">Cancel</a>
                </div>
            </div>
            </form>
        </div>
   

@endsection


