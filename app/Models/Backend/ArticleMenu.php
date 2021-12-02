<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleMenu extends Model
{
    use HasFactory;

    public static function getMenuTree(){
        return self::with('children')->where('p_id',0)->orderBy('sort')->get();
    }

    public function children()
    {
        return $this->hasMany(self::class, 'p_id', 'id')->with('children')->orderBy('sort');
    }
}
