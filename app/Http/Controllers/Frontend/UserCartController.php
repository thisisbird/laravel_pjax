<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Frontend\UserCart;
use Illuminate\Support\Facades\Cookie;

class UserCartController extends Controller
{
    //

    public function index($cookies_id = ''){


        return view('frontend.user_cart.index', compact('cookies_id'));
    }
}
