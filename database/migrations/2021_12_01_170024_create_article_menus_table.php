<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name_tw',50);
            $table->string('name_en',50);
            $table->tinyInteger('sort');
            $table->tinyInteger('level');
            $table->tinyInteger('p_id');
            $table->boolean('is_display')->comment('是否顯示');
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
        Schema::dropIfExists('article_menus');
    }
}
