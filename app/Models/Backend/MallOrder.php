<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MallOrder extends Model
{
    use HasFactory;

    public const UNPAID = 1;
    public const PAIDED = 2;
    public const SHIPPING = 3;
    public const FINISH = 4;

}
