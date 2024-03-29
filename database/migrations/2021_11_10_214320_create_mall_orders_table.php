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
            $table->string('order_code',20)->comment('訂單序號');
            $table->string('cookies',10)->nullable();
            $table->tinyInteger('state')->comment('狀態0:取消 1:未付款 2:待出貨 3:已出貨 4:已完成');
            $table->string('email')->nullable();
            $table->string('name')->comment('收件人');
            $table->string('phone')->comment('連絡電話');
            $table->integer('zip')->nullable()->comment('收件者地址');
            $table->string('city')->nullable();
            $table->string('dist')->nullable();
            $table->string('address');
            $table->string('shipping_price')->default(0)->comment('運費');
            $table->tinyInteger('shipping_type')->default(0)->comment('運送方式 1:宅配');
            $table->string('discount')->default(0)->comment('折扣');
            $table->tinyInteger('payment_type')->comment('付款方式 1:信用卡 2:ATM 3:貨到付款');
            $table->timestamp('payment_at')->nullable()->comment('付款日期');
            $table->string('tax_id_number')->nullable()->comment('統編');
            $table->tinyInteger('invoice_type')->comment('發票類型0:列印 1:載具 2:統編 3:愛心');
            $table->string('invoice')->nullable()->comment('發票號碼');
            $table->string('carrier')->nullable()->comment('載具碼');
            $table->decimal('price',10,2)->comment('價格');
            $table->string('source',10)->comment('訂單來源');
            $table->string('language',5)->comment('語系: tw,en');
            $table->text('tip')->nullable()->comment('顧客備註');
            $table->text('tip2')->nullable()->comment('後台備註');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['state','user_id']);

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
