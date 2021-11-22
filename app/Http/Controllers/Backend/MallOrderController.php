<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class MallOrderController extends Controller
{
    //
    public function index(Request $request){
        // dump($request->all());
        return view('backend.mall_order.index', compact('request'));
    }
}
