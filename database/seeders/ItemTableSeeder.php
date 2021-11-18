<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\MallItem;
use App\Models\Backend\ItemMenuMallItem;
use App\Models\Backend\MallItemDetail;
use App\Models\Backend\MallItemInfo;
use App\Models\Backend\ItemMenu;

class ItemTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        ItemMenu::create(['name_tw' => '3C商品', 'name_en' => '3C product', 'sort' => 1, 'level' => 1, 'p_id' => 0]);
        ItemMenu::create(['name_tw' => '羅技', 'name_en' => 'logi', 'sort' => 2, 'level' => 1, 'p_id' => 1]);
        ItemMenu::create(['name_tw' => '鍵盤', 'name_en' => 'keyboard', 'sort' => 3, 'level' => 1, 'p_id' => 2]);
        ItemMenu::create(['name_tw' => '滑鼠', 'name_en' => 'mouse', 'sort' => 4, 'level' => 1, 'p_id' => 2]);

        for ($i = 1; $i <= 4; $i++) {
            MallItem::create([
                'code' => 'product_' . $i,
                'sort' => $i,
                'is_display' => 1,
                'is_shopping' => 1,
                'is_hot' => 1,
                'is_new' => 1,
                'photo' => [],
            ]);
            if(in_array($i,[1,2])){//鍵盤
                MallItemDetail::create(['mall_item_id'=>$i,'name_tw'=>'紅軸','name_en'=>'red type','stock'=>888,'buy_stock'=>100,'photo'=>'','discription'=>'']);
                MallItemDetail::create(['mall_item_id'=>$i,'name_tw'=>'青軸','name_en'=>'blue type','stock'=>888,'buy_stock'=>100,'photo'=>'','discription'=>'']);
                MallItemInfo::create(['mall_item_id'=>$i,'name'=>'機械鍵盤','o_price'=>1500,'price'=>1200,'cost'=>600,'language'=>'tw','special'=>'特色描述','info'=>'商品規格','discription'=>'商品描述']);
                MallItemInfo::create(['mall_item_id'=>$i,'name'=>'keyboard','o_price'=>49.9,'price'=>39.9,'cost'=>19.9,'language'=>'en','special'=>'special','info'=>'info','discription'=>'discription']);
                ItemMenuMallItem::create(['item_menu_id'=>1,'mall_item_id'=>$i]);
                ItemMenuMallItem::create(['item_menu_id'=>2,'mall_item_id'=>$i]);
                ItemMenuMallItem::create(['item_menu_id'=>3,'mall_item_id'=>$i]);
                
            }
            if(in_array($i,[3,4])){//滑鼠
                MallItemDetail::create(['mall_item_id'=>$i,'name_tw'=>'大','name_en'=>'XL','stock'=>777,'buy_stock'=>200,'photo'=>'','discription'=>'']);
                MallItemDetail::create(['mall_item_id'=>$i,'name_tw'=>'小','name_en'=>'M','stock'=>777,'buy_stock'=>200,'photo'=>'','discription'=>'']);
                MallItemInfo::create(['mall_item_id'=>$i,'name'=>'光學滑鼠','o_price'=>1500,'price'=>1200,'cost'=>600,'language'=>'tw','special'=>'特色描述','info'=>'商品規格','discription'=>'商品描述']);
                MallItemInfo::create(['mall_item_id'=>$i,'name'=>'the Mouse','o_price'=>49.9,'price'=>39.9,'cost'=>19.9,'language'=>'en','special'=>'special','info'=>'info','discription'=>'discription']);
                ItemMenuMallItem::create(['item_menu_id'=>1,'mall_item_id'=>$i]);
                ItemMenuMallItem::create(['item_menu_id'=>2,'mall_item_id'=>$i]);
                ItemMenuMallItem::create(['item_menu_id'=>4,'mall_item_id'=>$i]);
            }
        }
    }
}
