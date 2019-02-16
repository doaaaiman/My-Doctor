@extends('layouts.app')
@section('title',$title)
@section('content')
<br>

<!-- Main Content -->
<!-- Main Content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">
                    <form class="row">
                        <div class="col-3">
                            <input autofocus value="{{request()['q']}}" type="text" class="form-control"  name="q" placeholder="Enter Here" >
                        </div>
                        <!--                <div class="col-2">
                                            <select id="specialties_id" class="form-control" name="specialties_id" >
                                                <option value="">Select Specialty</option>
                                                @foreach($specialties as $specialty)
                                                <option {{request()['specialties_id']==$specialty->id?"selected":""}} value='{{$specialty->id}}'>{{$specialty->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>-->
                        <div class="col-2">
                            <input type="submit" value="Search" class="btn btn-primary" />
                        </div>

                    </form>
                    <div class="table-responsive">
                        @if($questions->count()>0)   
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Specialty Name</th>
                                    <th>Question Body</th>
                                    <th>Answer Body</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $question)
                                <tr>
                                    <td>{{$question->user->name??''}}</td>
                                    <td>{{$question->specialty->name??''}}</td>
                                    <td>{{$question->body}}</td>

                                    <td>
                                        <a href='/doctor/question/{{$question->id}}/answer' class="btn btn-info btn-fw">All Answers</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{$questions->links()}} 
                    </div>



                    @else
                    <div class='alert mt-4 alert-info'>There is no items to show</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


