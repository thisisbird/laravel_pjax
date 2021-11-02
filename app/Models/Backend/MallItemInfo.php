<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MallItemInfo extends Model
{
    use SoftDeletes;
    // protected $primaryKey = 'mall_item_id';
    protected $fillable = ['mall_item_id','language','name','o_price','price','cost','special','info','discription'];

}
