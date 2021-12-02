<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleInfo extends Model
{
    use SoftDeletes;

    protected $fillable = ['article_id','language','title','discription'];

}
