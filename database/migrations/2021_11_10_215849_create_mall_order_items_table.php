<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('mall_item_detail_id')->nullable();
            $table->integer('qty')->default(0);
            $table->decimal('price',8,2)->default(0);
            $table->string('discription')->nullable()->comment('商品說明/商品名稱-細節');
            $table->timestamps();
            $table->index(['mall_item_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mall_order_items');
    }
}
