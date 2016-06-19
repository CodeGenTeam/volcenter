<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('descr');
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rule');
            $table->string('descr');
        });

        Schema::create('user_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('created_by')->unsigned();
        });

        Schema::create('group_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->integer('permission_id')->unsigned();
        });

        Schema::create('user_group_accessories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->integer('created_by')->unsigned();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_group_accessories');
        Schema::dropIfExists('group_permissions');
        Schema::dropIfExists('user_permissions');
        Schema::dropIfExists('permission_groups');
        Schema::dropIfExists('permissions');
    }
}
