@extends('admin._dashboard_layout')
@section('title','All comments for this Post')
@section('content')

<div class="container">
           <div class="col-5">
                    <a href="/admin/post/{{$post->id}}/addComment" class="btn btn-success">Create New Comment</a>
                </div>
            <div class="table-responsive">
                @if($comments->count()>0) 
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>All Comments</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comments as $comment)
                        @if($comment->posts_id==$post->id)
                        <tr>
                            <td>{{$comment->body??'There is no answer'}}</td>
                            <td>
                                <a href='/admin/comment/{{$comment->id}}/delete' onclick='return confirm("Are you sure?")' class="btn btn-danger btn-fw">Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
          
    </div>
    @else
    <div class='alert mt-4 alert-info'>There is no items to show</div>
    @endif
</div>
@endsection


