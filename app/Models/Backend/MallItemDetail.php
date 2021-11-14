<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MallItemDetail extends Model
{
    use SoftDeletes;
    
    /**
     * Get the user that owns the MallItemDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mallItem()
    {
        return $this->belongsTo(MallItem::class);
    }

    public static function getShoppingMallItemByDetailId($detail_id,$language = 'tw'){
        $mall_item_detail = MallItemDetail::whereHas('mallItem',function($q){
            $q->where('is_shopping',1);
        })->with('mallItem.infoTw','mallItem.infoEn')->find($detail_id);
        if(is_array($detail_id)){
            $data = [];
            foreach ($mall_item_detail as $item) {
                $get_info = self::MallItemFormat($item,$language);
                if($get_info) $data[] = $get_info;
            }
        }else{
            $data = self::MallItemFormat($mall_item_detail,$language);
        }
        return $data;
    }
    public static function MallItemFormat($mall_item_detail,$language){
        if($language == 'tw'){
            $datail_name_key = 'name_tw';$info_key = 'infoTw';
        }    
        if($language == 'en'){
            $datail_name_key = 'name_en';$info_key = 'infoEn';
        }
        try{
            $data['detail_id'] = $mall_item_detail->id;
            $data['detail_name'] = $mall_item_detail->$datail_name_key;
            $data['detail_stock'] = $mall_item_detail->stock;
            $data['detail_buy_stock'] = $mall_item_detail->buy_stock;
            $data['detail_max_stock'] = $data['detail_stock'] - $data['detail_buy_stock'];
            $data['detail_photo'] = $mall_item_detail->photo;
            $data['code'] = $mall_item_detail->mallItem->code;
            $data['photo'] = $mall_item_detail->mallItem->photo;
            $data['is_hot'] = $mall_item_detail->mallItem->is_hot;
            $data['is_new'] = $mall_item_detail->mallItem->is_new;
            $data['is_shopping'] = $mall_item_detail->mallItem->is_shopping;
            $data['name'] = $mall_item_detail->mallItem->$info_key->name;
            $data['o_price'] = $mall_item_detail->mallItem->$info_key->o_price;
            $data['price'] = $mall_item_detail->mallItem->$info_key->price;
            $data['cost'] = $mall_item_detail->mallItem->$info_key->cost;
            $data['special'] = $mall_item_detail->mallItem->$info_key->special;
            $data['info'] = $mall_item_detail->mallItem->$info_key->info;
            $data['discription'] = $mall_item_detail->mallItem->$info_key->discription;
            return $data;
        } catch (\Exception $e) {
            return null;
        }
    }

}
