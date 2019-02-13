@extends('admin._dashboard_layout')
@section('title','Create Comment')
@section('content')

<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">

            <form class="forms-sample" method="post" enctype="multipart/form-data" action="/admin/post/{{$post->id}}/addComment">
                @csrf
                
                <div class="form-group row">
                    <label for="answerbody" class="col-sm-4 col-form-label">Comment Body</label>
                    <div class="col-sm-6">
                        <textarea autofocus class="form-control" name="body" id="body" placeholder="Enter your answer">{{old('body')}}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <a href="/admin/post" class="btn btn-dark">Cancel</a>
            </form>
        </div>
    </div>
</div>

@endsection


