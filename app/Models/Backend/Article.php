<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $casts  = ['photo'=>'array'];

    public function info()
    {
        return $this->hasMany(ArticleInfo::class);
    }
    public function infoTw()
    {
        return $this->hasOne(ArticleInfo::class)->where('language','tw');
    }
    public function infoEn()
    {
        return $this->hasOne(ArticleInfo::class)->where('language','en');
    }



    public function menu()
    {
        return $this->belongsToMany(ArticleMenu::class, 'article_menu_articles', 'article_id', 'article_menu_id');
    }
}
