@extends('admin._dashboard_layout')
@section('title','Create Question')
@section('content')

<div class="container">

    <form class="forms-sample" method="post" enctype="multipart/form-data" action="/admin/question">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Question Body</label>
            <div class="col-sm-6">
                <textarea autofocus class="form-control" name="body" id="body" placeholder="Enter your Question">{{old('body')}}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="specialties_id" class="col-sm-2 col-form-label">Specialty</label>
            <div class="col-2">
                <select autofocus id="specialties_id" class="form-control" name="specialties_id" >
                    <option value="">Select Specialty</option>
                    @foreach($specialties as $specialty)
                    <option {{old('specialties_id')==$specialty->id?"selected":""}} value='{{$specialty->id}}'>{{$specialty->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-9 offset-sm-2 mt-3">
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <a href="/admin/question" class="btn btn-dark">Cancel</a>
            </div>
        </div>
    </form>

</div>

@endsection


