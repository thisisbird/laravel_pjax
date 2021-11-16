<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Session;

class Permissions extends Model
{
    protected $table = 'backend_permissions';
    const default_sidebar = [11,12,13];


    public static function sidebar()
    {
        if(!Auth::guard('backend')->check()){
            return redirect()->route('backend.user.login');//
        }

        $i = 0; //主選項
        $menu[$i] = ['title' => 'Menu', 'url' => '#', 'icon' => 'fa fa-fw fa-user-circle', 'type' => 'divider', 'id' => 1]; //type:divider 底下看不到
        $menu[$i]['submenu'][0] = ['title' => '使用者權限1', 'url' => '#', 'id' => 2];
        $menu[$i]['submenu'][0]['submenu'][0] = ['title' => '使用者管理a', 'url' => route('backend.user.index'), 'id' => 3];
        $menu[$i]['submenu'][1] = ['title' => '使用者管理2', 'url' => route('backend.user.index'), 'id' => 4];

        $i = 1;
        $menu[$i] = ['title' => '使用者管理', 'url' => '#', 'icon' => 'fa fa-fw fa-user-circle', 'id' => 11];
        $menu[$i]['submenu'][0] = ['title' => '使用者權限', 'url' => route('backend.user.index'), 'id' => 12];
        $menu[$i]['submenu'][1] = ['title' => '角色管理', 'url' => route('backend.role.index'), 'id' => 13];


        $i = 2;
        $menu[$i] = ['title' => '商品管理', 'url' => '#', 'icon' => 'fas fa-shopping-basket', 'id' => 21];
        $menu[$i]['submenu'][0] = ['title' => '商城分類', 'url' => route('backend.itemMenu.index'), 'id' => 22];
        $menu[$i]['submenu'][1] = ['title' => '商品資訊', 'url' => route('backend.mallItem.index'), 'id' => 23];

        $i = 3;
        $menu[$i] = ['title' => '訂單管理', 'url' => '#', 'icon' => 'fas fa-shopping-cart', 'id' => 31];
        $menu[$i]['submenu'][0] = ['title' => '未完成訂單', 'url' => route('backend.mallOrder.index'), 'id' => 32];
        $menu[$i]['submenu'][1] = ['title' => '已完成訂單', 'url' => route('backend.mallOrder.index'), 'id' => 33];
        // $i = 2;
        // $menu[$i] = ['title' => 'PIXI', 'url' => '#', 'icon' => 'fa fa-fw fa-user-circle', 'id' => 21];
        // $menu[$i]['submenu'][0] = ['title' => '測試', 'url' => route('backend.pixi.test'), 'id' => 22];
        // $menu[$i]['submenu'][1] = ['title' => '測試2', 'url' => route('backend.pixi.test2'), 'id' => 23];
        // $menu[$i]['submenu'][2] = ['title' => '測試3', 'url' => route('backend.pixi.test3'), 'id' => 24];
        // $menu[$i]['submenu'][3] = ['title' => '測試4', 'url' => route('backend.pixi.test4'), 'id' => 25];


        // $i = 3;
        // $menu[$i] = ['title' => 'Stock', 'url' => '#', 'icon' => 'fas fa-chart-bar', 'id' => 31];
        // $menu[$i]['submenu'][0] = ['title' => 'k線', 'url' => route('backend.stock.kline'), 'id' => 32];


        if(!session('permissions_id')){
            if(Auth::guard('backend')->user()->role){
                Session::put('permissions_id', Auth::guard('backend')->user()->role->permissions->pluck('permissions_id')->toArray());//設置權限
            }
            Session::put('permissions_id', []);//設置權限
        }
        $tree = self::tree($menu);
        $data['all_sidebar'] = $menu;
        $data['display_sidebar'] = $tree['display_sidebar'];
        if(count($tree['permissions_url']) == 0){
            $tree['permissions_url'] = route('backend.user.dashboard');
        }
        if(Auth::guard('backend')->user()->account == 'admin'){
            $data['display_sidebar'] = $data['all_sidebar'];
        }else{
            self::isPermissions($tree['permissions_url']);
        }
        return $data;
    }

    public static function isPermissions($permissions_url_list)
    {
        $permissions_url_list = collect($permissions_url_list)->unique();//可訪問的url
        $is_allow = false;
        foreach ($permissions_url_list as $key=> $url) {
            $a = str_replace($url,'',url()->current());
            if($a == '' || (isset($a[0]) && $a[0]=='/')){
                $is_allow = true;
                break;
            }
        }
        if(!$is_allow){//無權限 導向第一個權限url
            if($permissions_url_list->count()){
                $url = $permissions_url_list->first();
                return redirect($url)->send();
            }
        }
    }

    public static function tree($menu,$permissions_url = []){
        foreach ($menu as $key => $menu_1) {
            if(!in_array($menu_1['id'],session('permissions_id') ?? [])){
                unset($menu[$key]);
            }else{
                if($menu_1['url'] != '#') $permissions_url[] = $menu_1['url'];
                if(isset($menu_1['submenu'])){
                    $menu[$key]['submenu'] = self::tree($menu_1['submenu'],$permissions_url)['display_sidebar'];
                    $permissions_url = array_merge(self::tree($menu_1['submenu'],$permissions_url)['permissions_url'],$permissions_url) ;
                }
            }
        }
        $data['display_sidebar'] = $menu;
        $data['permissions_url'] = $permissions_url;
        return $data;
    }
}
