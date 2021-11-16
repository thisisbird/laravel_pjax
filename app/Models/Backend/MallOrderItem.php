<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MallOrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','mall_item_detail_id','qty','price','discription'];

}
