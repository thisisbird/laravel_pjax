<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MallItem extends Model
{
    use SoftDeletes;
    /**
     * Get all of the comments for the MallItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public $casts  = ['photo'=>'array'];
    
    public function info()
    {
        return $this->hasMany(MallItemInfo::class);
    }
    public function infoTw()
    {
        return $this->hasOne(MallItemInfo::class)->where('language','tw');
    }
    public function infoEn()
    {
        return $this->hasOne(MallItemInfo::class)->where('language','en');
    }

    public function detail()
    {
        return $this->hasMany(MallItemDetail::class);
    }
    /**
     * The roles that belong to the MallItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function menu()
    {
        return $this->belongsToMany(ItemMenu::class, 'item_menu_mall_items', 'mall_item_id', 'item_menu_id');
    }      
}
