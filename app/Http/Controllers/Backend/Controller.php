<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $i = 0;//主選項
        $menu[$i] = ['title' => 'Menu', 'url' => '#','icon'=>'fa fa-fw fa-user-circle','type'=>'divider'];//type:divider 底下看不到
        $menu[$i]['submenu'][0] = ['title' => '使用者權限1', 'url' => '#'];
        $menu[$i]['submenu'][0]['submenu'][0] = ['title' => '使用者管理a', 'url' => route('backend.user.index')];
        $menu[$i]['submenu'][1] = ['title' => '使用者管理2', 'url' => route('backend.user.index')];

        $i = 1;
        $menu[$i] = ['title' => '使用者管理', 'url' => '#','icon'=>'fa fa-fw fa-user-circle'];
        $menu[$i]['submenu'][0] = ['title' => '使用者權限', 'url' => route('backend.user.index')];

        $i = 2;
        $menu[$i] = ['title' => 'PIXI', 'url' => '#','icon'=>'fa fa-fw fa-user-circle'];
        $menu[$i]['submenu'][0] = ['title' => '測試', 'url' => route('backend.pixi.test')];
        $menu[$i]['submenu'][1] = ['title' => '測試2', 'url' => route('backend.pixi.test2')];
        $menu[$i]['submenu'][2] = ['title' => '測試3', 'url' => route('backend.pixi.test3')];
        return view()->share('sidebar_menu', $menu);
    }
}
