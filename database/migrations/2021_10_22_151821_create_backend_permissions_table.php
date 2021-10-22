<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackendPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backend_permissions', function (Blueprint $table) {
            $table->tinyInteger('role_id');
            $table->tinyInteger('permissions_id')->comment('指定Model BackendPermissions.php');
            $table->primary(['role_id', 'permissions_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backend_permissions');
    }
}
