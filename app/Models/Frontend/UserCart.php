<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class UserCart extends Model
{
    use HasFactory;
    public static function test(){
        Cookie::queue('test', 'Hello, Laravel', 100000);//如果不適用上面的use Cookie,這裏可以直接調用 \Cookie
        $a = Cookie::get('test');
        dump($a);
    }
}
