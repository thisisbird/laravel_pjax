<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class UserCart extends Model
{
    use HasFactory;

    protected $fillable = ['cookies','user_id','mall_item_detail_id','qty','price','language'];
    

}
