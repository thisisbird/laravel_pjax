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

        $i = 1;//主選項
        $menu[$i] = ['title' => '使用者管理', 'url' => '#','icon'=>'fa fa-fw fa-user-circle'];
        $menu[$i]['submenu'][0] = ['title' => '使用者權限', 'url' => '#'];
        // $menu[$i]['submenu'][0]['submenu'][0] = ['title' => '使用者管理2', 'url' => route('backend.user.index')];

        
        return view()->share('sidebar_menu', $menu);
    }
}
