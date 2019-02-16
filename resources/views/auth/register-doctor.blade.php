@extends('layouts.app')

@section('content')
<div class="mt-5"></div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Doctor Register</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post-doctor-register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

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
                            <label for="specialties_id" class="col-md-4 col-form-label text-md-right">{{ __('Specailty') }}</label>

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
                            <label for="CV" class="col-md-4 col-form-label text-md-right">{{ __('CV') }}</label>

                            <div class="col-md-6">
                                <input id="cv" type="text" class="form-control{{ $errors->has('cv') ? ' is-invalid' : '' }}" name="cv" value="{{ old('cv') }}">

                                @if ($errors->has('cv'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cv') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">

                    <div class="col-md-6 offset-md-4">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="hidden" name="active" value="0">
                            <input  {{old('active')? "checked":""}} type="checkbox" value="0" class="custom-control-input" required id="acceptCheck" name="active">
                            <label class="custom-control-label" for="acceptCheck">I'm Agree </label>
                        </div>
                    </div>
                </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5"></div>
@endsection
