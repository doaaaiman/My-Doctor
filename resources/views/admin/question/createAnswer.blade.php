@extends('admin._dashboard_layout')
@section('title','Create Answer')
@section('content')

<div class="col-lg-12 stretch-card">


    <form class="forms-sample" method="post" enctype="multipart/form-data" action="/admin/question/{{$question->id}}/addAnswer">
        @csrf

        <div class="form-group row ">
            <label for="doctors_id" class="col-sm-2 col-form-label">Question </label>
            <div class="col-sm-6">
                <input disabled value="{{$question->body}}" type="text" class="form-control" id="questions_id" name="questions_id" placeholder="Question id">
            </div>
        </div>
        <div class="form-group row">
            <label for="answerbody" class="col-sm-2 col-form-label">Answer</label>
            <div class="col-sm-6">
                <textarea autofocus class="form-control" name="body" id="body" placeholder="Enter your answer">{{old('body')}}</textarea>
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


