<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends Controller
{
    
    public function index()
    {
        $page_name = 'Permission';
        $data = Permission::all();
        return view('admin.permission.list', compact('data', 'page_name'));
    }

   
    public function create()
    {
        return view('admin.permission.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_num'
        ],[
            'name.required' => 'Name is required!',
            'name.alpha_num' => 'This field Accept alpha number characters'
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->action('Admin\PermissionController@index')->with('success',"Permission Created Successfully!");
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $page_name = "Permission Edit";
        $permission = Permission::find($id);
        return view('admin.permission.edit', compact('permission', 'page_name'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|alpha_num'
        ],[
            'name.required' => 'Name is required!',
            'name.alpha_num' => 'This field Accept alpha number characters'
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->action('Admin\PermissionController@index')->with('success',"Permission Updated Successfully!");
    }

    
    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return redirect()->action('Admin\PermissionController@index')->with('success',"Permission Deleted Successfully!");
    }
}
