<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_items', function (Blueprint $table) {
            $table->id();
            $table->string('code',50)->comment('商品編號');
            $table->integer('sort');
            $table->boolean('is_display')->comment('是否顯示');
            $table->boolean('is_shopping')->comment('可否購買');
            $table->boolean('is_hot')->comment('熱銷');
            $table->boolean('is_new')->comment('新品');
            $table->json('photo')->comment('陣列-照片路徑');
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
        Schema::dropIfExists('mall_items');
    }
}
