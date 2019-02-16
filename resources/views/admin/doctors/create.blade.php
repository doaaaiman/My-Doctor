@extends('admin._dashboard_layout')

@section('title', 'Create New User')

@section('css')

@endsection()


@section('content')

<div class='container'>

    <div class="col-md-8 col-lg-6  py-5 px-4  ">

        <form  method="post" enctype="multipart/form-data" action="/admin/doctors">
            @csrf
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label   ">User Name</label>
                <div class="col-sm-9">
                    <input value="{{ old('name')}}" type="text" class="form-control" id="username" name="name"  >
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label  ">Email</label>
                <div class="col-sm-9">
                    <input  value="{{ old('email')}}" type="text" class="form-control" id="email" name="email"  >
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label  ">Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile_no" class="col-md-3 col-form-label text-md-right">{{ __('Mobile') }}</label>

                <div class="col-md-6">
                    <input id="mobile" type="text" class="form-control{{ $errors->has('mobile_no') ? ' is-invalid' : '' }}" name="mobile_no" value="{{ old('mobile_no') }}">

                    @if ($errors->has('mobile_no'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mobile_no') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="specialties_id" class="col-md-3 col-form-label text-md-right">{{ __('Specailty') }}</label>

                <div class="col-md-6">
                    <select autofocus id="specialties_id" class="form-control {{ $errors->has('specialties_id') ? ' is-invalid' : '' }}" name="specialties_id" >

                        <option value='0'>Select Specialty</option>

                        @foreach($specialties as $specialty)
                        <option {{old('specialties_id')==$specialty->id?"selected":""}} 
                            value='{{$specialty->id}}'>{{$specialty->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('specialties_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('specialties_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                            <label for="CV" class="col-md-3 col-form-label text-md-right">{{ __('CV') }}</label>

                            <div class="col-md-6">
                                <input id="cv" type="text" class="form-control{{ $errors->has('cv') ? ' is-invalid' : '' }}" name="cv" value="{{ old('cv') }}">

                                @if ($errors->has('cv'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cv') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
            
            <div class="form-group row mt-4">

                <div class="col-sm-9 offset-sm-3">
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <input type="hidden" name="active" value="0">
                        <input {{old('active')? "checked":""}} type="checkbox" value="1" class="custom-control-input" id="acceptCheck" name="active">
                        <label class="custom-control-label" for="acceptCheck">Active</label>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-9 offset-sm-3 mt-3">
                    <button type="submit" name="register" class="btn btn-primary">Create</button>
                    <a href="/admin/doctors" class="btn btn-secondary">Cancel</a>
                </div>
            </div>

        </form>
    </div>

</div>



@endsection()


@section('js')

@endsection()
