@extends('admin._dashboard_layout')
@section('title', 'Edit User Details')
@section('css')
@endsection()

@section('content')

        <div class='container'>

        <div class="col-md-8 col-lg-6  py-4 px-4  ">

            <form  method="post" enctype="multipart/form-data" action="/admin/users/{{ $user->id}}">
                @csrf
                @method('put')


                <div class="form-group row mt-5">
                    <label for="username" class="col-sm-3 col-form-label   ">User Name</label>
                    <div class="col-sm-9">
                        <input value="{{old('name')? old('name') : $user->name}}" type="text" class="form-control   " id="username" name="name"  >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label  ">Email</label>
                    <div class="col-sm-9">
                        <input  value="{{old('email')? old('email') :  $user->email}}" type="text" class="form-control   " id="email" name="email"  >
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-sm-9 offset-sm-3 mt-3">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="hidden" name="active" value="0">
                            <input type="checkbox" class="custom-control-input" id="acceptCheck" name="active"  value="1" {{ $user->active == 1? 'checked' :''}} >
                            <label class="custom-control-label" for="acceptCheck">Active</label>
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3 mt-3">
                        <button type="submit" name="register" class="btn btn-primary">Update</button>
                        <a href="/admin/users" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>

            </form>
        </div>

</div>

@endsection()


@section('js')

@endsection()
