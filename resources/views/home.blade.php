@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <br>
                    <br>
                    <br>
                    @if(Auth::user()->type=='doctor')
                    <a href='/doctor/post' class='btn btn-sm btn-dark'>Post</a>
                    <a href='/doctor/question' class='btn btn-sm btn-dark'>Question</a>
                    @elseif(Auth::user()->type=='patient')
                    <a href='/patient/question' class='btn btn-sm btn-dark'>Ask Question</a>
                    @else(Auth::user()->type=='admin')
                     <a href='/admin/users' class='btn btn-sm btn-dark'>Dashboard</a>
                     @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
