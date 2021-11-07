<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ItemMenu extends Model
{
    /**
     * Get all of the comments for the ItemMenu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, 'p_id', 'id')->with('children')->orderBy('sort');
    }

    public static function getMenuTree(){
        return self::with('children')->where('p_id',0)->orderBy('sort')->get();
    }
}
