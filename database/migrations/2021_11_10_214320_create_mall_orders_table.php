<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mall_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('cookies',10)->nullable();
            $table->tinyInteger('state')->comment('狀態0:取消 1:未付款 2:待出貨 3:已出貨 4:已完成');
            $table->string('email')->nullable();
            $table->string('name')->comment('收件人');
            $table->string('phone')->comment('連絡電話');
            $table->tinyInteger('zip')->comment('收件者地址');;
            $table->string('city');
            $table->string('dist');
            $table->string('address');
            $table->string('shipping_price')->comment('運費');
            $table->string('discount')->comment('折扣');
            $table->tinyInteger('payment_type')->comment('付款方式 1:信用卡 2:ATM 3:貨到付款');
            $table->timestamp('payment_at')->comment('付款日期');
            $table->string('tax_id_number')->comment('統編');
            $table->string('invoice')->comment('發票號碼');
            $table->string('carrier')->comment('載具');
            $table->decimal('price',10,2)->comment('價格');
            $table->string('language',5)->comment('語系: tw,en');
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
        Schema::dropIfExists('mall_orders');
    }
}