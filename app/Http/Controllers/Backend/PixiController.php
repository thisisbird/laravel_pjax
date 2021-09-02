<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\Controller;
use Illuminate\Http\Request;

class PixiController extends Controller
{

    public function test(Request $request)
    {
        return view('backend.pixi.test');
    }
    public function test2(Request $request)
    {
        return view('backend.pixi.test2');
    }
    public function test3(Request $request)
    {
        return view('backend.pixi.test3');
    }

}
