@extends('admin._dashboard_layout')
@section('title', 'Edit User Details')
@section('css')
@endsection()

@section('content')

        <div class='container'>

        <div class="col-md-8 col-lg-6  py-4 px-4  ">

            <form  method="post" enctype="multipart/form-data" action="/admin/patients/{{$doctor->id}}">
                @csrf
                @method('put')


                <div class="form-group row mt-5">
                    <label for="mobile_no" class="col-sm-3 col-form-label   ">Mobile Number</label>
                    <div class="col-sm-9">
                        <input value="{{old('mobile_no')? old('mobile_no') : $user->mobile_no}}" type="text" class="form-control" id="mobile_no" name="mobile_no"  >
                    </div>
                </div>

                
                
                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3 mt-3">
                        <button type="submit" name="register" class="btn btn-primary">Update</button>
                        <a href="/admin/patients" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>

            </form>
        </div>

</div>

@endsection()


@section('js')

@endsection()
