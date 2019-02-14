@extends('layouts.app')
@section('title',$title)
@section('content')
<br>
<br>
<br>
<br><br>
<br><br>
<br>
    <!-- Main Content -->
    <div class="container">
        <form class="row">
            <div class="col-3">
                <input autofocus value="{{request()['q']}}" type="text" class="form-control" placeholder="Enter your search" name="q" />
            </div>
            <div class="col-2">
                <select name="active" class="form-control">
                    <option value="">Any status</option>
                    <option {{request()['active']=='1'?'selected':''}} value="1">Active</option>
                    <option {{request()['active']=='0'?'selected':''}} value="0">Inactive</option>
                </select>
            </div>
            <div class="col-2">
                <input type="submit" value="Search" class="btn btn-primary" />
            </div>
            <div class="col-3">
                <a href="/doctor/post/create" class="btn btn-success">Create New Post</a>
            </div>
        </form>
        @if($items->count()>0)
        <table class="table mt-3 table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th width="20%" scope="col">Last Update</th>
              <th width="10%" scope="col">Active</th>
              <th width="15%"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
                <tr>
                  <td>{{$item->title}}</td>
                  <td>{{$item->updated_at}} </td>
                  <td>{{$item->active?'Active':'Inactive'}}</td>
                  <td>
                    <a href='/doctor/post/{{$item->id}}/edit' class='btn btn-sm btn-primary'>Edit</a>
                    <a onclick="return confirm('Are you sure dude?')" href='/doctor/post/{{$item->id}}/delete' class='btn btn-sm btn-danger'>Delete</a>
                  </td>
                </tr>
            @endforeach
    
          </tbody>
        </table>
        {{$items->links()}}
        @else
        <div class='alert mt-4 alert-info'>There is no items to show</div>
        @endif
    </div>

@endsection()
