@extends('admin._dashboard_layout')
@section('title','All Questions')
@section('content')

<div class="col-lg-12 stretch-card">

            <form class="row">
                <div class="col-3">
                    <input autofocus value="{{request()['q']}}" type="text" class="form-control"  name="q" placeholder="Enter Here" >
                </div>
                <div class="col-2">
                    <select id="specialties_id" class="form-control" name="specialties_id" >
                        <option value="">Select Specialty</option>
                        @foreach($specialties as $specialty)
                        <option {{request()['specialties_id']==$specialty->id?"selected":""}} value='{{$specialty->id}}'>{{$specialty->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" value="Search" class="btn btn-primary" />
                </div>
                <div class="col-5">
                    <a href="/admin/question/create" class="btn btn-success">Create New question</a>
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
                            <td>{{$question->user->name}}</td>
                            <td>{{$question->specialty->name??''}}</td>
                            <td>{{$question->body}}</td>
                            <td>
                                 <a href='/admin/question/{{$question->id}}/answer' class="btn btn-info btn-fw">All Answers</a>
                                <a href='/admin/question/{{$question->id}}/delete' onclick='return confirm("Are you sure?")' class="btn btn-danger btn-fw">Delete</a>
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
@endsection


