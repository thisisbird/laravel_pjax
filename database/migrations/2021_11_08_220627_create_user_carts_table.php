<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_carts', function (Blueprint $table) {
            $table->id();
            $table->string('cookies',10)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('mall_item_detail_id');
            $table->integer('qty');
            $table->decimal('price',10,2)->comment('價格');
            $table->string('language',5)->comment('語系: tw,en');
            $table->timestamps();
            $table->index(['user_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_carts');
    }
}
