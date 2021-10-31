<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemMenuMallItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_menu_mall_items', function (Blueprint $table) {
            $table->integer('item_menu_id');
            $table->integer('mall_item_id');
            $table->timestamps();
            $table->primary(['mall_item_id', 'item_menu_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_menu_mall_items');
    }
}
