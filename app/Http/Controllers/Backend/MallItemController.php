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
        if ($request->language != 'en' && $request->language != 'tw') {
            $request->language = 'tw';
        }
        $datas = MallItem::with('menu','info','detail');
        if ($request->search) {
            $datas = $datas->where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $datas = $datas->get();
        }
        $menus = ItemMenu::with('children')->where('p_id',0)->orderBy('sort')->get();
        return view('backend.mall_item.index',compact('datas','menus','request'));
    }
    public function edit(Request $request,$id){
        if ($request->language != 'en' && $request->language != 'tw') {
            $request->language = 'tw';
        }
        $datas = MallItem::with('menu','info','detail');
        if ($request->search) {
            $datas = $datas->where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            $datas = $datas->get();
        }
        $select_data = MallItem::with('menu','info','detail')->find($id);
        $menus = ItemMenu::with('children')->where('p_id',0)->orderBy('sort')->get();
        $select_menu = ItemMenu::find($id);
        return view('backend.mall_item.index',compact('datas','request','select_data','menus','select_menu'));
    }
    public function update(Request $request){
        try{
            DB::beginTransaction();
            if($request->action_type == 'create'){
                $mall_item = new MallItem();
                $mall_item->code = $request->code ?? '';
                $mall_item->sort = $request->sort ?? 0;//none
                $mall_item->is_display = $request->is_display ?? 0;
                $mall_item->is_shopping = $request->is_shopping ?? 0;
                $mall_item->is_hot = $request->is_hot ?? 0;
                $mall_item->is_new = $request->is_new ?? 0;
                $mall_item->photo = json_encode($request->photo) ?? json_encode(['path','aaaa']);//none
                $mall_item->save();

                $mall_item_info = new MallItemInfo();
                $mall_item_info->mall_item_id = $mall_item->id;
                $mall_item_info->name = $request->name ?? '';
                $mall_item_info->o_price = $request->o_price ?? 0;
                $mall_item_info->price = $request->price ?? 0;
                $mall_item_info->special = $request->special ?? '';
                $mall_item_info->info = json_encode($request->info) ?? json_encode(['規格'=>'大','顏色'=>'綠']);
                $mall_item_info->discription = $request->discription ?? '';
                $mall_item_info->language = $request->language ?? 'tw';
                $mall_item_info->save();

                if($request->stock && count($request->stock)){
                    foreach ($request->stock as $i => $value) {
                        $mall_item_detail = new MallItemDetail();
                        $mall_item_detail->mall_item_id = $mall_item->id;
                        $mall_item_detail->name_tw = $request->name_tw[$i] ?? '';
                        $mall_item_detail->name_en = $request->name_en[$i] ?? '';
                        $mall_item_detail->stock = $request->stock[$i] ?? 0;
                        $mall_item_detail->buy_stock = $request->buy_stock[$i] ?? 0;
                        $mall_item_detail->photo = $request->detail_photo[$i] ?? '';//none
                        $mall_item_detail->discription = $request->detail_discription[$i] ?? '';//none
                        $mall_item_detail->save();
                    }
                }

            }
            if($request->action_type == 'update'){
                // dd($request->all());
                $mall_item = MallItem::find($request->data_id);
                $mall_item->code = $request->code;
                $mall_item->sort = $request->sort ?? 0;//none
                $mall_item->is_display = $request->is_display ?? 0;
                $mall_item->is_shopping = $request->is_shopping ?? 0;
                $mall_item->is_hot = $request->is_hot ?? 0;
                $mall_item->is_new = $request->is_new ?? 0;
                $mall_item->photo = json_encode($request->photo) ?? json_encode([]);//none
                $mall_item->save();

                $mall_item_info = MallItemInfo::where('mall_item_id',$request->data_id)->where('language',$request->language)->first();
                if(!$mall_item_info) $mall_item_info = new MallItemInfo();
                $mall_item_info->mall_item_id = $mall_item->id;
                $mall_item_info->name = $request->name ?? '';
                $mall_item_info->o_price = $request->o_price ?? 0;
                $mall_item_info->price = $request->price ?? 0;
                $mall_item_info->special = $request->special ?? '';
                $mall_item_info->info = json_encode($request->info) ?? json_encode([]);
                $mall_item_info->discription = $request->discription ?? '';
                $mall_item_info->language = $request->language ?? '';
                $mall_item_info->save();

                MallItemDetail::where('mall_item_id',$request->data_id)->delete();
                if($request->stock && count($request->stock)){
                    foreach ($request->stock as $i => $value) {
                        $mall_item_detail = new MallItemDetail();
                        $mall_item_detail->mall_item_id = $mall_item->id;
                        $mall_item_detail->name_tw = $request->name_tw[$i] ?? '';
                        $mall_item_detail->name_en = $request->name_en[$i] ?? '';
                        $mall_item_detail->stock = $request->stock[$i] ?? 0;
                        $mall_item_detail->buy_stock = $request->buy_stock[$i] ?? 0;
                        $mall_item_detail->photo = $request->detail_photo[$i] ?? 'img_path';//none
                        $mall_item_detail->discription = $request->detail_discription[$i] ?? '';//none
                        $mall_item_detail->save();
                    }
                }

            }
            DB::commit();
            return redirect()->back()->withSuccess('更新成功');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
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
