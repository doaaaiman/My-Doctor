@extends('admin._dashboard_layout')
@section('title', 'Users')

@section('css')
<style>
    tr:hover{
       cursor: pointer;
    }
</style>
@endsection()
@section('content')
    
        <div class='container'>
                <form class='row'>
                    <div class="col-sm-10">
                        <div class="row text-right no-gutters">
                    <div class="col-sm-3  ml-auto mr-2">
                        <input maxlength="30" type="text" class="form-control" name="q" value="{{request()['q']}}" placeholder="Search..">
                    </div>

                    
                    <div class="col-sm-2 mr-2">
                        <select name="active" class="form-control ">
                            <option value="">Any Status</option>
                            <option {{request()['active']== '1' ? 'selected' : ''}} value="1">Active</option>
                            <option {{request()['active']== '0' ? 'selected' : ''}} value="0">Inactive</option>
                        </select>
                    </div>


                    <input type="submit" value="Search" class="btn btn-primary">
                </div>
                  
                   </div>
                    
                </form>
                
                @if($users->count()>0)
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th>Updated At</th>
                                <th >Actions</th>
                            </tr>
                        </thead>
   
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td >{{$user->name}}</td>
                                <td >{{$user->email}}</td>
                                <td >  <input  disabled type="checkbox" {{($user->active) ? 'checked' :''}}> </td>
                                <td>{{$user->updated_at}}</td>

                                <td  class="text-center" width="20%">
                                    <a href='/admin/doctors/{{$user->type_id}}/edit' class='btn btn-sm btn-secondary'>Edit</a>
                                    <a href='/admin/doctors/{{$user->type_id}}/delete' class='btn btn-sm btn-danger'>Delete</a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                      {{$users->links()}}
                </div>
                
               @else
               <div class="mt-5 alert alert-info">There is no items to show</div>
               @endif
               </div>
    @endsection()
