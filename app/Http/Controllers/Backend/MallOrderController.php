<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\MallOrder;
use Session;

class MallOrderController extends Controller
{
    public function index(Request $request,$id = null){
        Session::put('order_task_url',request()->fullUrl());
        // dump($request->all(),$id,Session::get('order_task_url'));
        $order_state = MallOrder::$order_state;
        $request->state = $request->state ?? [MallOrder::PAIDED];//預設已付款
        $mall_order = MallOrder::whereIn('state',$request->state);
        
        $mall_order = $mall_order->paginate(2)->appends($request->except('_pjax'));
        $select_order = MallOrder::find($id);
        return view('backend.mall_order.index', compact('mall_order','request','order_state','select_order'));
    }
    public function update(Request $request,$id = null){
        $url = Session::get('order_task_url');
        try{
            $order = MallOrder::find($id);
            $order->state = $request->state;
            $order->save();
            // dd($order,$request->all());

            return redirect($url)->withSuccess('狀態更新成功');
        } catch (\Exception $e) {
            return redirect($url)->withErrors(['error'=>'狀態更新失敗']);
        }
    }

}
