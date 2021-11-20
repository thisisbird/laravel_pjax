<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\MallItem;
use App\Models\Backend\MallItemDetail;
use App\Models\Backend\MallItemInfo;
use App\Models\Backend\ItemMenuMallItem;
use App\Models\Backend\ItemMenu;
use DB;
use Illuminate\Support\Facades\Validator;
use Exception;
class MallItemController extends Controller
{
    private function common($request)
    {
        if ($request->language != 'en' && $request->language != 'tw') {
            $request->language = 'tw';
        }
        $datas = MallItem::with('menu', 'info', 'detail');
        if ($request->search) {
            $keyword = '%' . $request->search . '%';
            $mall_item_ids = MallItemInfo::where('name', 'like', $keyword)->orWhere('price',$request->search)->orWhere('o_price',$request->search)->orWhere('cost',$request->search)->pluck('mall_item_id')->toArray();
            $datas = $datas->where(function($q) use ($mall_item_ids,$keyword){
                $q->whereIn('id', $mall_item_ids)->orWhere('code', 'like', $keyword);
            });
        } 
        if ($request->menu) {
            $mall_item_ids = ItemMenuMallItem::whereIn('item_menu_id',$request->menu)->pluck('mall_item_id')->toArray();
            $datas = $datas->whereIn('id', $mall_item_ids);
        }    
        if ($request->is_display === '1' || $request->is_display === '0') $datas = $datas->where('is_display',$request->is_display);
        if ($request->is_shopping === '1' || $request->is_shopping === '0') $datas = $datas->where('is_shopping',$request->is_shopping);
        if ($request->is_hot === '1' || $request->is_hot === '0') $datas = $datas->where('is_hot',$request->is_hot);
        if ($request->is_new === '1' || $request->is_new === '0') $datas = $datas->where('is_new',$request->is_new);
        
        $datas = $datas->get();
        
        $menus = ItemMenu::getMenuTree();
        return ['datas' => $datas, 'menus' => $menus, 'request' => $request];
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
        $rules = array(
            'name' => 'required',
            'code' => 'required|unique:mall_items,code,' . $request->data_id, //unique:table,欄位,排除的id
            'stock' => 'required|array',
        );
        $message = array(
            'name.required' => '商品名稱必填',
            'code.required' => '商品編號必填!',
            'code.unique' => '商品編號重複!',
            'stock.required' => '至少輸入一種品項名稱!',
        );
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();

            //商品主體
            $mall_item = MallItem::find($request->data_id);
            if(!$mall_item) $mall_item = new MallItem();
            $mall_item->code = $request->code;
            $mall_item->sort = $request->sort ?? 0; //none
            $mall_item->is_display = $request->is_display ?? 0;
            $mall_item->is_shopping = $request->is_shopping ?? 0;
            $mall_item->is_hot = $request->is_hot ?? 0;
            $mall_item->is_new = $request->is_new ?? 0;
            $img = $mall_item->photo ?? [];

            if($request->sort_cover){
                $sort_cover = explode(',',$request->sort_cover);
                foreach ($sort_cover as $photo) {
                    $img[] = $photo;
                }
            }
            if($request->delete_cover){
                $delete_cover = explode(',',$request->delete_cover);
                foreach ($delete_cover as $photo) {
                    if (($key = array_search($photo, $img)) !== false) {
                        unset($img[$key]);
                        $this->deleteImagePath($photo);
                    }
                }
            }

            if($request->cover && count($request->cover)){
                foreach ($request->cover as $i => $cover) {
                    if($cover != null){
                        $img[] = $this->uploadImagePath($cover);
                    }
                }
            }

            $img = array_values($img);
            $mall_item->photo = $img; //none

            $mall_item->save();

            $mall_item_id = $request->data_id ?? $mall_item->id;

            if ($request->menu && count($request->menu)) {
                $menu_data = [];
                ItemMenuMallItem::where('mall_item_id',$mall_item_id)->delete();
                foreach ($request->menu as  $menu_id) {
                    $menu_data[] = ['mall_item_id'=>$mall_item_id,'item_menu_id'=>$menu_id];
                }
                ItemMenuMallItem::insert($menu_data);
            }


            //中英文價格資訊
            $info_data = [
                'mall_item_id' => $mall_item_id,
                'language' => $request->language ?? 'tw',
                'name' => $request->name ?? '',
                'o_price' => $request->o_price ?? 0,
                'price' => $request->price ?? 0,
                'cost' => $request->cost ?? 0,
                'special' => $request->special ?? '',
                'info' => $request->info ?? '',
                'discription' => $request->discription ?? ''
            ];
            $mall_item_info = MallItemInfo::where('mall_item_id', $mall_item_id)->where('language', $request->language)->update($info_data);
            if (!$mall_item_info) MallItemInfo::create($info_data);

            //品項資訊
            MallItemDetail::where('mall_item_id', $mall_item_id)->delete();
            if ($request->detail_id && count($request->detail_id)) {
                foreach ($request->detail_id as $i => $id) {
                    $mall_item_detail = MallItemDetail::withTrashed()->find($id);
                    if (!$mall_item_detail) $mall_item_detail = new MallItemDetail();
                    $mall_item_detail->mall_item_id = $mall_item->id;
                    $mall_item_detail->name_tw = $request->name_tw[$i] ?? '';
                    $mall_item_detail->name_en = $request->name_en[$i] ?? '';
                    $mall_item_detail->stock = $request->stock[$i] ?? 0;
                    $mall_item_detail->buy_stock = $request->buy_stock[$i] ?? 0;
                    $mall_item_detail->photo = $request->detail_photo[$i] ?? '';
                    if (isset($request->image[$i])) {
                        $mall_item_detail->photo = $this->uploadImagePath($request->image[$i]);
                    }
                    $mall_item_detail->discription = $request->detail_discription[$i] ?? ''; //none
                    $mall_item_detail->deleted_at = null;
                    $mall_item_detail->save();
                }
            }
            DB::commit();
            return redirect()->back()->withSuccess('更新成功');
        } catch (Exception $e) {
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
    public function deletePhoto(Request $request){
        return response()->json(['success'=>true], 200);
    }
}
