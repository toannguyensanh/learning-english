<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$users = User::all();
        return view('admin.user.home', compact('users'));
    }

    public function create() {
    	return view('admin.user.edit');
    }

    public function edit($id) {
    	$user = User::find($id);
    	return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request) {
    	if(!$request->input('id')) {
    		$check = User::where('email', $request->input('email'))->first();
    		if($check) {
    			Session::flash('error', 'User failed to save successfully!');
    			return redirect('/admin/user/create');
    		}

    		$arr_req = $request->all();
    		$user = new User();
    		$user->name = $arr_req['name'];
    		$user->email = $arr_req['email'];
    		$user->password = Hash::make($arr_req['description']);
    		$user->avatar = $arr_req['avatar'];
    		$user->save();

    		Session::flash('success', 'User saved successfully!');
    		
    		return redirect('/admin/user/edit/'.$user->id);
    	}
    	else {
    		$user = User::findOrFail($request->input('id'));

    		$user->update($request->all());

    		Session::flash('success', 'User saved successfully!');

    		return redirect('/admin/user/edit/'.$user->id);
    	}
    }

    public function delete($id) {
    	$user = User::findOrFail($id);
    	$user->delete();

    	$user->roles()->sync([]); // Delete relationship data

    	Session::flash('success', 'Delete successfully!');

    	return redirect('admin/user');
    }
}
