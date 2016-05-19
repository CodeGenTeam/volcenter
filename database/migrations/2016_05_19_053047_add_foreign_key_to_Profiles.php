<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToProfiles extends Migration
{
    private $tableName = 'Profiles';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table($this->tableName, function (Blueprint $table) {
			$table->index('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table($this->tableName, function (Blueprint $table) {
			$table->dropForeign('profiles_user_id_foreign');
		});
    }
}
