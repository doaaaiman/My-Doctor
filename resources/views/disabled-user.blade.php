@extends('layouts.app')
@section('title',$title)
@section('content')


 <!-- Main Content -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{$title}}</div>

                <div class="card-body">
        <div class="alert alert-danger">
        This user has been disabled from system admin
        </div>
    </div>
 </div>
    </div>
         </div>
    </div>
@endsection()
