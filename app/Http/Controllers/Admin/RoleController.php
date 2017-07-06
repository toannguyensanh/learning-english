<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$roles = Role::all();
        return view('admin.role.home', compact('roles'));
    }

    public function create() {
    	return view('admin.role.edit');
    }

    public function edit($id) {
    	$role = Role::find($id);
    	return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request) {
    	if(!$request->input('id')) {
    		$check = Role::where('name', $request->input('name'))->first();
    		if($check) {
    			Session::flash('error', 'Role failed to save successfully!');
    			return redirect('/admin/role/create');
    		}

    		$arr_req = $request->all();
    		$role = new Role();
    		$role->name = $arr_req['name'];
    		$role->display_name = $arr_req['display_name'];
    		$role->description = $arr_req['description'];
    		$role->save();

    		Session::flash('success', 'Role saved successfully!');
    		
    		return redirect('/admin/role/edit/'.$role->id);
    	}
    	else {
    		$role = Role::findOrFail($request->input('id'));

    		$role->update($request->all());

    		Session::flash('success', 'Role saved successfully!');

    		return redirect('/admin/role/edit/'.$role->id);
    	}
    }

    public function delete($id) {
    	$role = Role::findOrFail($id);
    	$role->delete();

    	$role->users()->sync([]); // Delete relationship data
		$role->perms()->sync([]); // Delete relationship data

		$role->forceDelete(); // Now force delete will work regardless of whether the pivot table has cascading delete

    	Session::flash('success', 'Delete successfully!');

    	return redirect('admin/role');
    }
}
