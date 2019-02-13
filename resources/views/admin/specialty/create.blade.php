@extends('admin._dashboard_layout')
@section('title','Create Speailty')
@section('content')

<!-- Main Content -->
<div class="container">

    <form class="forms-sample" method="post" enctype="multipart/form-data" action="/admin/specialty">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-8">
                <input autofocus value="{{old('name')}}" type="text" class="form-control" name="name" id="name" placeholder="Specailty name">
            </div>
        </div>
        <div class="form-group row">
            <label for="flePhoto" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-8">
                <input type="file" name="flePhoto" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-8 offset-sm-2">
                <button type="submit" class="btn btn-success mr-2">Add</button>
                <a href="/admin/specialty" class="btn btn-dark">Cancel</a>
            </div>
        </div>
    </form>
</div>


@endsection


