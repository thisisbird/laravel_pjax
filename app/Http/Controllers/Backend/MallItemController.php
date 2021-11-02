<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\MallItem;
use App\Models\Backend\MallItemDetail;
use App\Models\Backend\MallItemInfo;
use App\Models\Backend\ItemMenu;
use DB;
use Illuminate\Support\Facades\Validator;

class MallItemController extends Controller
{
    private function common($request){
        if ($request->language != 'en' && $request->language != 'tw') {
            $request->language = 'tw';
        }
        $datas = MallItem::with('menu', 'info', 'detail');
        if ($request->search) {
            $keyword = '%'.$request->search.'%';
            $mall_item_ids = MallItemInfo::where('name','like',$keyword)->orWhere('price','like',$keyword)->pluck('mall_item_id');
            $datas = $datas->whereIn('id',$mall_item_ids)->orWhere('code', 'like',$keyword)->get();
        } else {
            $datas = $datas->get();
        }
        $menus = ItemMenu::with('children')->where('p_id', 0)->orderBy('sort')->get();
        return ['datas'=>$datas,'menus'=>$menus,'request'=>$request];
    }
    public function index(Request $request)
    {
        $common = $this->common($request);
        $menus = $common['menus'];
        $datas = $common['datas'];
        return view('backend.mall_item.index', compact('datas', 'menus', 'request'));
    }
    public function edit(Request $request, $id)
    {
        $common = $this->common($request);
        $menus = $common['menus'];
        $datas = $common['datas'];
        $select_data = MallItem::with('menu', 'info', 'detail')->find($id);
        $select_menu = ItemMenu::find($id);
        return view('backend.mall_item.index', compact('datas', 'request', 'select_data', 'menus', 'select_menu'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $rules = array(
            'name' => 'required',
            'code' => 'required|unique:mall_items,code,'.$request->data_id,//unique:table,欄位,排除的id
            'stock' => 'required|array',
        );
        $message = array(
            'name.required' => '商品名稱必填',
            'code.unique' => '商品編號重複!',
            'stock.required' => '至少輸入一種品項名稱!',
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            if ($request->action_type == 'create') {
                $mall_item = new MallItem();
                $mall_item->code = $request->code ?? '';
                $mall_item->sort = $request->sort ?? 0; //none
                $mall_item->is_display = $request->is_display ?? 0;
                $mall_item->is_shopping = $request->is_shopping ?? 0;
                $mall_item->is_hot = $request->is_hot ?? 0;
                $mall_item->is_new = $request->is_new ?? 0;
                $mall_item->photo = json_encode($request->photo) ?? json_encode(['path', 'aaaa']); //none
                $mall_item->save();

                $mall_item_info = new MallItemInfo();
                $mall_item_info->mall_item_id = $mall_item->id;
                $mall_item_info->name = $request->name ?? '';
                $mall_item_info->o_price = $request->o_price ?? 0;
                $mall_item_info->price = $request->price ?? 0;
                $mall_item_info->cost = $request->cost ?? 0;
                $mall_item_info->special = $request->special ?? '';
                $mall_item_info->info = $request->info ?? '';
                $mall_item_info->discription = $request->discription ?? '';
                $mall_item_info->language = $request->language ?? 'tw';
                $mall_item_info->save();

                if ($request->stock && count($request->stock)) {
                    foreach ($request->stock as $i => $value) {
                        $mall_item_detail = new MallItemDetail();
                        $mall_item_detail->mall_item_id = $mall_item->id;
                        $mall_item_detail->name_tw = $request->name_tw[$i] ?? '';
                        $mall_item_detail->name_en = $request->name_en[$i] ?? '';
                        $mall_item_detail->stock = $request->stock[$i] ?? 0;
                        $mall_item_detail->buy_stock = $request->buy_stock[$i] ?? 0;
                        $mall_item_detail->photo = $request->detail_photo[$i] ?? ''; //none
                        $mall_item_detail->discription = $request->detail_discription[$i] ?? ''; //none
                        $mall_item_detail->save();
                    }
                }
            }
            if ($request->action_type == 'update') {
                $mall_item = MallItem::find($request->data_id);
                $mall_item->code = $request->code;
                $mall_item->sort = $request->sort ?? 0; //none
                $mall_item->is_display = $request->is_display ?? 0;
                $mall_item->is_shopping = $request->is_shopping ?? 0;
                $mall_item->is_hot = $request->is_hot ?? 0;
                $mall_item->is_new = $request->is_new ?? 0;
                $mall_item->photo = json_encode($request->photo) ?? json_encode([]); //none
                $mall_item->save();

                $info_data = [
                    'mall_item_id' => $request->data_id, 
                    'language' => $request->language,
                    'name' => $request->name ?? '',
                    'o_price' => $request->o_price ?? 0,
                    'price' => $request->price ?? 0,
                    'cost' => $request->cost ?? 0,
                    'special' => $request->special ?? '',
                    'info' => $request->info ?? '',
                    'discription' => $request->discription ?? ''
                ];
                $mall_item_info = MallItemInfo::where('mall_item_id', $request->data_id)->where('language', $request->language)->update($info_data);
                if (!$mall_item_info) MallItemInfo::create($info_data);

                MallItemDetail::where('mall_item_id', $request->data_id)->forceDelete();
                if ($request->stock && count($request->stock)) {
                    foreach ($request->stock as $i => $value) {
                        $mall_item_detail = new MallItemDetail();
                        $mall_item_detail->mall_item_id = $mall_item->id;
                        $mall_item_detail->name_tw = $request->name_tw[$i] ?? '';
                        $mall_item_detail->name_en = $request->name_en[$i] ?? '';
                        $mall_item_detail->stock = $request->stock[$i] ?? 0;
                        $mall_item_detail->buy_stock = $request->buy_stock[$i] ?? 0;
                        $mall_item_detail->photo = $request->photo[$i] ?? '';
                        if(isset($request->image[$i])){
                            $mall_item_detail->photo = $this->uploadImagePath($request->image[$i]);
                        }
                        $mall_item_detail->discription = $request->detail_discription[$i] ?? ''; //none
                        $mall_item_detail->save();
                    }
                }
            }
            DB::commit();
            return redirect()->back()->withSuccess('更新成功');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();
            if ($request->menu_id) {
                $data = ItemMenu::find($request->menu_id);
                if ($data) {
                    $menu2 = ItemMenu::where('p_id', $data->id);
                    if ($menu2->get()->count()) {
                        $menu2_ids = $menu2->pluck('id');
                        ItemMenu::whereIn('p_id', $menu2_ids)->delete();
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
