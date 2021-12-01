<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fb')->nullable()->unique();
            $table->string('google')->nullable()->unique();
            $table->string('line')->nullable()->unique();
            $table->string('email')->nullable()->unique()->comment('會員登入信箱使用|不可重複');
            $table->string('email_info')->nullable()->comment('信箱資訊');
            $table->integer('zip')->nullable()->comment('收件者地址');
            $table->string('city')->nullable();
            $table->string('dist')->nullable();
            $table->string('address')->nullable();
            $table->integer('bonus_point')->default(0)->comment('點數');

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
