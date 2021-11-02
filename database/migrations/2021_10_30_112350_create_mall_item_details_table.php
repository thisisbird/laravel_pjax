<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_item_details', function (Blueprint $table) {
            $table->id();
            $table->integer('mall_item_id');
            $table->string('name_tw',50)->comment('規格名稱-中文');
            $table->string('name_en',50)->comment('規格名稱-英文');
            $table->integer('stock')->default(0)->comment('庫存');
            $table->integer('buy_stock')->default(0)->comment('已購買數量');
            $table->text('photo')->nullable()->comment('照片路徑-單張');
            $table->text('discription')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mall_item_details');
    }
}
