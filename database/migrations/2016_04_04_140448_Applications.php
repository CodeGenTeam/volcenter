<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Applications
 * таблица заявок
 */
class Applications extends Migration
{
    private $tableName = 'Applications';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // пользователь
            $table->integer('event_id')->unsigned(); // мероприятие
            $table->integer('status_id')->unsigned(); // статус заявки
            $table->timestamp('datetime')->useCurrent(); // дата и время заявки
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($this->tableName);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
