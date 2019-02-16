@extends('layouts.app')
@section('title',$title)
@section('content')

<br>

<!-- Main Content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">
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
                            <div class="col-sm-5">
                                <input autofocus value="{{old('body')}}" type="text" class="form-control" name="body" id="body" placeholder="Add Comment">
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" value="Add Comment" class="btn btn-success" />
                            </div>
                        </div>

                        @endif
                        @endguest


                        <div class="form-group row">
                            <label for="body" class="col-sm-2 col-form-label">Comments</label>
                            @if($comments->count()>0) 
                            <table> 
                                @foreach($comments as $comment)
                                @if($comment->posts_id==$post->id)
                                <tr>
                                    <td>{{$comment->body??'There is no answer'}}.</td>
                                </tr>
                                @endif
                                @endforeach
                            </table>

                            @endif
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-2">
                                <a class="btn btn-dark" href="/">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
