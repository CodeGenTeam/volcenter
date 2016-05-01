<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Permissions extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('PermissionGroups', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('created_by')->default(-1);
            $table->timestamps();
        });

        Schema::create('Permissions', function(Blueprint $table) {
            $table->increments('id');
            $table->string('rule');
        });

        Schema::create('UserPermissions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('permission_id');
            $table->integer('created_by')->default(-1);
            $table->timestamps();
        });

        Schema::create('GroupPermissions', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('permission_id');
            $table->integer('created_by')->default(-1);
            $table->timestamps();
        });

        Schema::create('UserGroupAccessory', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('group_id');
            $table->integer('created_by')->default(-1);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('PermissionGroups');
        Schema::dropIfExists('Permissions');
        Schema::dropIfExists('UserPermissions');
        Schema::dropIfExists('GroupPermissions');
        Schema::dropIfExists('UserGroupPermission');

    }
}