<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Controller;
use App\Models\Backend\Permissions;
use App\Models\Backend\Role;
class RoleController extends Controller
{
    public function index(Request $request){
        if ($request->search) {
            $roles = Role::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $roles = Role::get();
        }
        return view('backend.role.index',compact('roles','request'));
    }
    public function edit(Request $request,$id){

        if ($request->search) {
            $roles = Role::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $roles = Role::get();
        }
        $select_role = Role::find($id);
        return view('backend.role.index',compact('roles','request','select_role'));
    }
    public function update(Request $request){
        try{
            if($request->action_type == 'create'){
                $role = new Role();
                $role->name = $request->name;
                $role->discription = $request->discription ?? 'test';
                $role->save();
                $data = [];
                if($request->permissions_id){
                    foreach($request->permissions_id as $permissions_id) {
                        $data[] = ['role_id' => $role->id,'permissions_id'=>$permissions_id,'created_at'=>now()];
                    }
                }
                Permissions::insert($data);
            }
            if($request->action_type == 'update'){
                Permissions::where('role_id',$request->role_id)->delete();
                $role = Role::find($request->role_id);
                $role->name = $request->name;
                $role->discription = $request->discription ?? 'test';
                $role->save();
                $data = [];
                if($request->permissions_id){
                    foreach($request->permissions_id as $permissions_id) {
                        $data[] = ['role_id' => $request->role_id,'permissions_id'=>$permissions_id,'created_at'=>now()];
                    }
                }
                Permissions::insert($data);
            }
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function delete(Request $request){
        $roles = Role::get();
        return view('backend.role.index',compact('roles','request'));
    }
}
