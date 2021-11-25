<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Controller;
use App\Models\Backend\Permissions;
use App\Models\Backend\Role;
use App\Models\Backend\ItemMenu;
use DB;
class ItemMenuController extends Controller
{
    public function index(Request $request){
        $menus = ItemMenu::getMenuTree();
        return view('backend.item_menu.index',compact('menus','request'));
    }
    public function edit(Request $request,$id){

        $menus = ItemMenu::getMenuTree();
        $select_menu = ItemMenu::find($id);
        return view('backend.item_menu.index',compact('menus','request','select_menu'));
    }
    public function update(Request $request){
        try{
            if($request->action_type == 'create'){
                $msg = '新增成功';
                $data = new ItemMenu();
                $data->name_tw = $request->name_tw;
                $data->name_en = $request->name_en;
                $data->sort = 99;
                $data->level = 0;
                $data->p_id = $request->p_id;
                $data->save();
                $data->sort = $data->id;
                $data->save();
            }
            if($request->action_type == 'update'){
                $msg = '更新成功';
                $data = ItemMenu::find($request->menu_id);
                if($request->sort_type){
                    if($request->sort_type == 'up'){
                        $symbol = '<';$sort = 'desc';
                    }
                    if($request->sort_type == 'down'){
                        $symbol = '>';$sort = 'asc';
                    }
                    $other_menu = ItemMenu::where('p_id',$data->p_id)->where('id','!=',$data->id)->where('sort',$symbol,$data->sort)->orderBy('sort',$sort)->first();
                    if($other_menu){
                        $temp_sort = $other_menu->sort;
                        $other_menu->sort = $data->sort;
                        $data->sort = $temp_sort;
                        $other_menu->save();
                        $data->save();
                    }else{
                        if($request->sort_type == 'up'){
                            $msg = '已是最高';
                        }
                        if($request->sort_type == 'down'){
                            $msg = '已是最低';
                        }
                        return redirect()->back()->withErrors($msg);
                    }
                }else{
                    $data->name_tw = $request->name_tw;
                    $data->name_en = $request->name_en;
                    $data->p_id = $request->p_id;
                    $data->save();
                }
            }
            return redirect()->back()->withSuccess($msg);;
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
            return redirect()->back()->withSuccess('刪除成功');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
