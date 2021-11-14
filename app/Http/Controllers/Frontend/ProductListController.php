<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Frontend\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Frontend\Role;
use App\Models\Backend\MallItem;
use App\Models\Backend\ItemMenuMallItem;

class ProductListController extends Controller
{

    public function index(Request $request,$id = 0)
    {
        $language = $this->language;
        $mall_item_ids = ItemMenuMallItem::where('item_menu_id',$id)->pluck('mall_item_id')->toArray();
        // $mall_items = MallItem::with('infoTw', 'detail')->where('is_display',1)->find($mall_item_ids);
        $mall_items = MallItem::getShoppingMallItemById($mall_item_ids,$language);
        return view('frontend.product_list.index',compact('mall_items'));
    }

}
