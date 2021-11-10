<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallItemInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_item_infos', function (Blueprint $table) {
            $table->integer('mall_item_id');
            $table->string('name',50);
            $table->decimal('o_price',8,2)->comment('原價');
            $table->decimal('price',8,2)->comment('售價');
            $table->decimal('cost',8,2)->comment('成本');
            $table->text('special')->comment('特色');
            $table->text('info')->comment('規格');
            $table->text('discription')->comment('詳細說明');
            $table->string('language',5)->comment('語系: tw,en');
            $table->primary(['mall_item_id', 'language']);
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
        Schema::dropIfExists('mall_item_infos');
    }
}
