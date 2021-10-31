<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\MallItem;
use App\Models\Backend\MallItemDetail;
use App\Models\Backend\MallItemInfo;
use App\Models\Backend\ItemMenu;
use DB;
class MallItemController extends Controller
{
    public function index(Request $request){
        if ($request->search) {
            $datas = MallItem::with('menu','info','detail')->where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $datas = MallItem::with('menu','info','detail')->get();
        }
        $menus = ItemMenu::with('children')->where('p_id',0)->orderBy('sort')->get();
        return view('backend.mall_item.index',compact('datas','menus','request'));
    }
    public function edit(Request $request,$id){

        if ($request->search) {
            $datas = MallItem::where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $datas = MallItem::get();
        }
        $select_data = MallItem::find($id);
        $menus = ItemMenu::with('children')->where('p_id',0)->orderBy('sort')->get();
        $select_menu = ItemMenu::find($id);
        return view('backend.mall_item.index',compact('datas','request','select_data','menus','select_menu'));
    }
    public function update(Request $request){
        dd($request->all());
        try{
            DB::beginTransaction();
            if($request->action_type == 'create'){
                $mall_item = new MallItem();
                $mall_item->code = $request->code ?? 'test';
                $mall_item->sort = $request->sort ?? 0;
                $mall_item->is_display = $request->is_display ?? '1';
                $mall_item->is_shopping = $request->is_shopping ?? '1';
                $mall_item->is_hot = $request->is_hot ?? '1';
                $mall_item->is_new = $request->is_new ?? '1';
                $mall_item->photo = $request->photo ?? json_encode(['path','aaaa']);
                $mall_item->save();

                $mall_item_info = new MallItemInfo();
                $mall_item_info->mall_item_id = $mall_item->id;
                $mall_item_info->name = $request->name ?? 'test';
                $mall_item_info->price = $request->price ?? 500;
                $mall_item_info->special = $request->special ?? 'test';
                $mall_item_info->info = $request->info ?? json_encode(['規格'=>'大','顏色'=>'綠']);
                $mall_item_info->discription = $request->discription ?? 'test';
                $mall_item_info->language = $request->language ?? 'tw';
                $mall_item_info->save();

                $mall_item_detail = new MallItemDetail();
                $mall_item_detail->mall_item_id = $mall_item->id;
                $mall_item_detail->name_tw = $request->name_tw ?? '紅色款';
                $mall_item_detail->name_en = $request->name_en ?? 'red style';
                $mall_item_detail->stock = $request->stock ?? 3;
                $mall_item_detail->buy_stock = $request->buy_stock ?? 1;
                $mall_item_detail->photo = $request->detail_photo ?? 'img_path';
                $mall_item_detail->discription = $request->detail_discription ?? '';
                $mall_item_detail->save();

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
            DB::commit();
            return redirect()->back()->withSuccess('更新成功');
        } catch (\Exception $e) {
            DB::rollback();
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
