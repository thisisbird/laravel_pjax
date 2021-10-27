<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\MallItem;

class MallItemController extends Controller
{
    public function index(Request $request){
        if ($request->search) {
            $datas = MallItem::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $datas = MallItem::get();
        }
        return view('backend.mall_item.index',compact('datas','request'));
    }
    public function edit(Request $request,$id){

        if ($request->search) {
            $datas = MallItem::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $datas = MallItem::get();
        }
        $select_data = MallItem::find($id);
        return view('backend.mall_item.index',compact('datas','request','select_data'));
    }
    public function update(Request $request){
        dd($request->all());
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
            return redirect()->back()->withSuccess('更新成功');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function delete(Request $request){
        try{
            DB::beginTransaction();
            if($request->menu_id){
                $data = ItemMenu::find($request->menu_id);
                if($data){
                    $menu2 = ItemMenu::where('p_id',$data->id);
                    if($menu2->get()->count()){
                        $menu2_ids = $menu2->pluck('id');
                        ItemMenu::whereIn('p_id',$menu2_ids)->delete();
                        $menu2->delete();
                    }
                    $data->delete();
                }
            }
            DB::commit();
            return redirect()->back()->withSuccess('刪除成功');;
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
