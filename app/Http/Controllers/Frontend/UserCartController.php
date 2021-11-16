<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\MallItemDetail;
use App\Models\Backend\MallItem;
use Illuminate\Http\Request;
use App\Models\Frontend\UserCart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\MallOrder;
use App\Models\Backend\MallOrderItem;
use DB;
class UserCartController extends Controller
{
    function getCart(){
        $user_cart = UserCart::where('language',$this->language);
        if($this->user_id){
            $user_cart = $user_cart->where('user_id',$this->user_id);
        }else{
            $user_cart = $user_cart->where('cookies',$this->cookies);
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
        $user_cart = $this->getCart()->where('mall_item_detail_id',$mall_item_detail_id)->first();
        if($user_cart){
            $user_cart->qty += $request->qty;
            $user_cart->save();
        }else{
            UserCart::create(['cookies'=>$this->cookies,'user_id'=>$this->user_id,'mall_item_detail_id'=>$mall_item_detail_id,'qty'=>$request->qty,'price'=>$mall_item['price'],'language'=>$language]);
        }

        if(Auth::user()){
            $data['cart_count']=UserCart::where('user_id',$this->user_id)->count();
        }else{
            $data['cart_count']=UserCart::where('cookies',$this->cookies)->count();
        }
        return response()->json($data, 200);
    }
    public function deleteCart(Request $request){
        $check = $this->getCart()->where('mall_item_detail_id',$request->mall_item_detail_id)->delete();
        if($check){
            $data['msg'] = '刪除成功';
            $count = $this->getCart()->count();
            $data['is_clear'] = $count ? false :true;//沒東西要清空填寫資本資料
            return response()->json($data, 200);
        }
        return response()->json('刪除失敗', 400);
    }

    public function createOrder(Request $request){
        // dd($request->all());
        try{
            DB::beginTransaction();
            $mall_order = new MallOrder;
            $mall_order->user_id = $this->user_id;
            $mall_order->cookies = $this->cookies;
            $mall_order->state = MallOrder::UNPAID;
            $mall_order->email = $request->email;
            $mall_order->name = $request->name;
            $mall_order->phone = $request->phone;
            $mall_order->zip = $request->zip ?? 812;
            $mall_order->city = $request->city ?? '';
            $mall_order->dist = $request->dist ?? '';
            $mall_order->address = $request->address ?? '';
            $mall_order->shipping_price = $request->shipping_price ?? 0;//運費
            $mall_order->discount = $request->discount ?? 0;
            $mall_order->payment_type = $request->payment_type ?? 1;
            $mall_order->payment_at = $request->payment_at;
            $mall_order->tax_id_number = $request->tax_id_number;//統編
            $mall_order->invoice = $request->invoice;//發票號碼
            $mall_order->carrier = $request->carrier;//載具
            $mall_order->price = $request->price;//統編
            $mall_order->language = $this->language;//統編
            $mall_order->save();

        $get_cart = $this->getCart()->get();
        if(!$get_cart->count()) return redirect()->back()->withErrors(['error'=>'購物車已空'])->withInput();
            
        
        foreach ($get_cart as $item) {
            MallOrderItem::create(['order_id'=>$mall_order->id,'mall_item_detail_id'=>$item->mall_item_detail_id,'qty'=>$item->qty,'price'=>$item->price,'discription'=>'']);
            $item->delete();
        }
        DB::commit();
        Cookie::queue(Cookie::forget('cart'));
        //TODO 寄信 or 轉跳付款頁面
        //TODO 轉跳訂單成立頁面
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['result' => $e->getMessage()], 422);
    }
    }
}
