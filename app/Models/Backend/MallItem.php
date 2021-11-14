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
    public static function getShoppingMallItemById($id,$language = 'tw'){
        $mall_item = MallItem::with('detail','infoTw','infoEn')->where('is_shopping',1)->find($id);
        if(is_array($id)){
            foreach ($mall_item as $item) {
                $get_info = self::MallItemFormat($item,$language);
                if($get_info) $data[] = $get_info;
            }
        }else{
            $data = self::MallItemFormat($mall_item,$language);
        }
        return $data;
    }
    public static function MallItemFormat($mall_item,$language){
        if($language == 'tw'){
            $info_key = 'infoTw';
        }    
        if($language == 'en'){
            $info_key = 'infoEn';
        }
        try{
            // $data['detail_id'] = $mall_item->detail->id;
            // $data['detail_name'] = $mall_item->detail->$datail_name_key;
            // $data['detail_stock'] = $mall_item->detail->stock;
            // $data['detail_buy_stock'] = $mall_item->detail->buy_stock;
            // $data['detail_photo'] = $mall_item->detail->photo;
            $data['detail'] = $mall_item->detail->toArray();
            $data['id'] = $mall_item->id;
            $data['code'] = $mall_item->code;
            $data['photo'] = $mall_item->photo;
            $data['is_hot'] = $mall_item->is_hot;
            $data['is_new'] = $mall_item->is_new;
            $data['is_shopping'] = $mall_item->is_shopping;
            $data['name'] = $mall_item->$info_key->name;
            $data['o_price'] = $mall_item->$info_key->o_price;
            $data['price'] = $mall_item->$info_key->price;
            $data['cost'] = $mall_item->$info_key->cost;
            $data['special'] = $mall_item->$info_key->special;
            $data['info'] = $mall_item->$info_key->info;
            $data['discription'] = $mall_item->$info_key->discription;
            return $data;
        } catch (\Exception $e) {
            dd($e);
            return null;
        }
    }
}
