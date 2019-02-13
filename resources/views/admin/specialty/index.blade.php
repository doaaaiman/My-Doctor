@extends('admin._dashboard_layout')
@section('title','AllSpeialties')
@section('content')

 <!-- Main Content -->
    <div class="container">
                  
            <form class="row">
                <div class="col-3">
                    <input autofocus value="{{request()['q']}}" type="text" class="form-control"  name="q" placeholder="Enter Here" >
                </div>
                <div class="col-6">
                    <input type="submit" value="Search" class="btn btn-primary" />
                </div>
                <div class="col-3">
                    <a href='/admin/specialty/create' class="btn btn-success btn-fw">Create Specialty</a>
                </div>
            </form>
            <div class="table mt-3 table-striped table-hover">
                @if($specialties->count()>0)   
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Specialty Name</th>
                            <th width="30%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($specialties as $speialty)
                        <tr>
                            <td>{{$speialty->id}}</td>
                            <td>{{$speialty->name}}</td>
                            <td>
                                <a href='/admin/specialty/{{$speialty->id}}/edit' class="btn btn-primary btn-fw">Edit</a>
                                <a href='/admin/specialty/{{$speialty->id}}/delete' onclick='return confirm("Are you sure?")' class="btn btn-danger btn-fw">Delete</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                {{$specialties->links()}} 
            </div>
    @else
    <div class='alert mt-4 alert-info'>There is no items to show</div>
    @endif
</div>
@endsection


