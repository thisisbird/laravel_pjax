<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\MallItemDetail;
use App\Models\Backend\MallItem;
use Illuminate\Http\Request;
use App\Models\Frontend\UserCart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    function getCart(){
        $language = $this->language;
        $cookies = $this->cookies;

        $user_cart = UserCart::where('language',$language);
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $user_cart = $user_cart->where('user_id',$user_id);
        }else{
            $user_cart = $user_cart->where('cookies',$cookies);
        }
        return $user_cart;
    }

    public function index($cookies_id = ''){
        $language = $this->language;
        $get_cart = $this->getCart()->get();
        $mall_item_detail_ids = $get_cart->pluck('mall_item_detail_id')->toArray();
        $mall_item_details = MallItemDetail::getShoppingMallItemByDetailId($mall_item_detail_ids,$language);
        $mall_item_details = collect($mall_item_details)->keyBy('detail_id')->toArray();
        $get_cart = $get_cart->toArray();
        foreach ($get_cart as $key => $value) {
            $get_cart[$key]['detail'] = $mall_item_details[$value['mall_item_detail_id']];
        }

        return view('frontend.user_cart.index', compact('cookies_id','get_cart'));
    }
    public function addCart(Request $request){
        $nodata = '請選擇規格!';
        $mall_item_detail_id = $request->mall_item_detail_id;
        $language = $request->language ?? $this->language;
        $mall_item = MallItemDetail::getShoppingMallItemByDetailId($mall_item_detail_id,$language);
        if(!$mall_item) return response()->json($nodata, 400);
        $cookies = $this->cookies;
        $qty = $request->qty;
        $user_id = null;
        $user_cart = UserCart::where('mall_item_detail_id',$mall_item_detail_id)->where('language',$language);
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $user_cart = $user_cart->where('user_id',$user_id);
        }else{
            $user_cart = $user_cart->where('cookies',$cookies);
        }
        $user_cart = $user_cart->first();
        if($user_cart){
            $user_cart->qty += $qty;
            $user_cart->save();
        }else{
            UserCart::create(['cookies'=>$cookies,'user_id'=>$user_id,'mall_item_detail_id'=>$mall_item_detail_id,'qty'=>$qty,'price'=>$mall_item['price'],'language'=>$language]);
        }

        if(Auth::user()){
            $data['cart_count']=UserCart::where('user_id',$user_id)->count();
        }else{
            $data['cart_count']=UserCart::where('cookies',$cookies)->count();
        }
        return response()->json($data, 200);
    }
    public function deleteCart(Request $request){
        $mall_item_detail_id = $request->mall_item_detail_id;
        $check = $this->getCart()->where('mall_item_detail_id',$mall_item_detail_id)->delete();
        if($check){
            $data['msg'] = '刪除成功';
            $count = $this->getCart()->count();
            $data['is_clear'] = $count ? false :true;//沒東西要清空填寫資本資料
            return response()->json($data, 200);
        }
        return response()->json('刪除失敗', 400);
    }

    public function createOrder(Request $request){
        dd($request->all());

    }
}
