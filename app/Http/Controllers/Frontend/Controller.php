<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Backend\Permissions;
use Illuminate\Http\Request;
use Storage;
use App\Models\Frontend\UserCart;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $cookies;
    public $language;

    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
          
        //     return $next($request);
        // });
        
        if(!Cookie::get('cart')){
          $cookies = $this->generateRandomString(10);
          Cookie::queue('cart', $cookies, 50000);//如果不適用上面的use Cookie,這裏可以直接調用 \Cookie
        }
        $this->cookies = Cookie::get('cart');
        $this->language = 'tw';
    }
    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

}
