<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     *  ajax載入頁面
     */
    public function ajaxContent()
    {
        return view('pjax2');
    }
}