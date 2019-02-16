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
                    <form method="post" action="/doctor/home/changepassword">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input autofocus  type="password" class="form-control" name="password" id="password" placeholder="Current Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="newpassword" class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-8">
                                <input  type="password" class="form-control" name="newpassword" id="newpassword" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="newpassword_confirmation" class="col-sm-3 col-form-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input  type="password" class="form-control" name="newpassword_confirmation" id="newpassword_confirmation" placeholder="New Password Confirmation">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-3">
                                <input type="submit" value="Change Password" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
