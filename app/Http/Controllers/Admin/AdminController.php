<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Link;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
class AdminController extends BaseController
{
    public function index() {

        $q = request()['q'];
        $active = request()['active'];

        
        $users = User::whereRaw('true');
        if ($q)
            $users->whereRaw('(name like ? or email like ? )', ["%$q%", "%$q%"]);
        if ($active != "")
            $users->where('active', $active);

        $users = $users->paginate(5)
                ->appends(['q' => $q, 'active' => $active]);

        return view('admin.users.index')
                        ->with('title', 'Users Management')
                        ->with('users', $users);
    }


    public function create() {
        //
        return view('admin.users.create')
                        ->with('title', 'Create New User');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:100',
            'password' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users'
        ]);
        $request['type']='admin';
        $request['password'] = Hash::make($request['password']);
        $inserted = User::create($request->all());
        \Session::flash('msg', 'User created successfully');

        return redirect('/admin/users/create');
    }
    public function edit($id) {
        $user = User::find($id);
        if (!$user) {
            \Session::flash('msg', 'w:Invalid User');
            return redirect('/admin/users');
        }
        return view('admin.users.edit')
                        ->with('title', 'Edit User')
                        ->with('user', $user);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email,'.$id
        ]);

        $account = User::find($id);
        $account->update($request->all());
        \Session::flash('msg', 'User updated successfully');

        return redirect('/admin/users');
    }
    public function destroy($id) {
        $account = User::find($id);
        $account->delete();
        \Session::flash('msg', 'User deleted successfully');
        return redirect('/admin/users');
    }
    
    public function links($id) {    
        $user = User::find($id);
        if (!$user) {
            \Session::flash('msg', 'w:Invalid User');
            return redirect('/admin/users');
        }
        $links = Link::orderBy('order_id')->get();
        return view('admin.users.links')
                        ->with('title', $user->name . ' Links')
                        ->with('links', $links)
                        ->with('user', $user);
    }
    public function postLinks(Request $request,$id) {
        
        DB::table('users_links')->where('users_id', $id)->delete();
        if($request->links){
            foreach($request->links as $links_id)
            {
                DB::table('users_links')->insert(['users_id'=>$id, 'links_id'=>$links_id]);
            }
        }
        \Session::flash('msg', 'User links saved successfully');

        return redirect('/admin/users');
    }
}
