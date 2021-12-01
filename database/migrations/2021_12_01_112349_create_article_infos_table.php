<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_infos', function (Blueprint $table) {
            $table->integer('article_id');
            $table->string('title',50)->comment('文章標題');
            $table->text('discription')->comment('詳細說明');
            $table->string('language',5)->comment('語系: tw,en');
            $table->primary(['article_id', 'language']);
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
        Schema::dropIfExists('article_infos');
    }
}
