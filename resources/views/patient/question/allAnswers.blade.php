@extends('layouts.app')
@section('title',$title)
@section('content')
<br>
<br>
<br>
<br><br>
<br><br>
<br>

<div class="col-lg-12 stretch-card">

    <div class="col-5">
        <a href="/doctor/question/{{$question->id}}/addAnswer" class="btn btn-success">Create New Answer</a>
    </div>
    <div class="table-responsive">
        @if($answers->count()>0) 
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Question Name</th>
                    <th>All Answers</th>
                    <th>Doctor Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach($answers as $answer)
                @if($answer->questions_id==$question->id)

                @foreach($doctors as $doctor)
                @if($answer->users_id==$doctor->id)
                <tr>
                    <td>{{$question->body}}</td>
                    <td>{{$answer->body??'There is no answer'}}</td>
                    <td>{{$doctor->name}}</td>
                    <td>
                        @if($doctor->name==\Auth::user()->name)
                        <a href='/doctor/answer/{{$answer->id}}/delete' onclick='return confirm("Are you sure?")' class="btn btn-danger btn-fw">Delete</a>
                        <a href='/doctor/answer/{{$answer->id}}/update' class="btn btn-info btn-fw">update</a>

                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
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


