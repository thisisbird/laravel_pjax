<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\MallOrder;
use Session;

class MallOrderController extends Controller
{
    public function index(Request $request,$id = null){
        Session::put('task_url',request()->fullUrl());
        dump($request->all(),$id,Session::get('task_url'));

        $order_state = MallOrder::$order_state;
        $request->state = $request->state ?? [MallOrder::PAIDED];//預設已付款
        $mall_order = MallOrder::paginate(2)->appends($request->except('_pjax'));
        return view('backend.mall_order.index', compact('mall_order','request','order_state','id'));
    }
    public function update(Request $request,$id = null){
        $url = Session::get('task_url');
        return redirect()->back()->withErrors(['error'=>'狀態更新失敗']);
        return redirect()->back()->withSuccess('狀態更新成功');
    }

}
