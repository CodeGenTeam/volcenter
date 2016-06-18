<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermissionComments extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('Permissions', function ($table) {
            $table->string('descr');
        });
        Schema::table('PermissionGroups', function ($table) {
            $table->string('descr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('Permissions', function ($table) {
            $table->dropColumn('descr');
        });
        Schema::table('PermissionGroups', function ($table) {
            $table->dropColumn('descr');
        });
    }
}
