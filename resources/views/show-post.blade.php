@extends('layouts.app')
@section('title',$title)
@section('content')

<br>


<!-- Main Content -->
<div class="container center">
    <form method="post" enctype="multipart/form-data" action="/patient/comment/{{$post->id}}/addComment">
        @csrf
        <div class="form-group row">
            <label for="photo" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-8">
                <img src="{{asset('storage/images/'.$post->photo)}}" alt="" class="img-fluid">
            </div>
        </div>

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-8">
                {{$post->title}}
                  </div>
        </div>

       <div class="form-group row">
            <label for="summary" class="col-sm-2 col-form-label">Summary</label>
            <div class="col-sm-8">
                {{$post->summary}}
            </div>
        </div>
        <div class="form-group row">
            <label for="details" class="col-sm-2 col-form-label">Details</label>
            <div class="col-sm-8">
                {{$post->details}}
            </div>
        </div>

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
       @endif
        
        @guest
                     
                     @else
        @if(\Auth::user()->type=='patient')

        <div class="form-group row">
            <label for="body" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-8">
                <input autofocus value="{{old('body')}}" type="text" class="form-control" name="body" id="body" placeholder="Add Comment">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-8 offset-sm-2">
               <input type="submit" value="Add Comment" class="btn btn-success" />
            </div>
        </div>
        @endif
         @endguest
        
         
        @if($comments->count()>0) 
        @foreach($comments as $comment)
        @if($comment->posts_id==$post->id)
        <div class="form-group row">
            <label for="body" class="col-sm-2 col-form-label">Comment</label>
            <div class="col-sm-8">
              {{$comment->body??'There is no answer'}}
            </div>
        </div>
        @endif
        @endforeach
        @endif
        
        <div class="form-group row">
            <div class="col-sm-8 offset-sm-2">
                <a class="btn btn-dark" href="/">Cancel</a>
            </div>
        </div>
    </form>
</div>

@endsection
