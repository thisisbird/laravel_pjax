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

    
}
