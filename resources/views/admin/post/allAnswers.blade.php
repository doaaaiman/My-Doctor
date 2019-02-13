@extends('adminLayouts.admin_layouts')
@section('title','All Answers for this question')
@section('content')

<div class="col-lg-12 stretch-card">
    <div class="card">
        <div class="card-body">
           <div class="col-5">
                    <a href="/question/{{$question->id}}/addAnswer" class="btn btn-success">Create New Answer</a>
                </div>
            <div class="table-responsive">
                @if($answers->count()>0) 
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Question Name</th>
                            <th>All Answers</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($answers as $answer)
                        @if($answer->questions_id==$question->id)
                        <tr>
                            <td>{{$question->body}}</td>
                            <td>{{$answer->body??'There is no answer'}}</td>
                            <td>
<!--                       <a href='/answer/{{$answer->id}}/update' class="btn btn-primary btn-fw">Edit</a>
                                -->
                                <a href='/answer/{{$answer->id}}/delete' onclick='return confirm("Are you sure?")' class="btn btn-danger btn-fw">Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class='alert mt-4 alert-info'>There is no items to show</div>
    @endif
</div>
@endsection


