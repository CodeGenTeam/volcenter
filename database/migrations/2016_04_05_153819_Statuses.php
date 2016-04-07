<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Statuses
 * таблица статусов заявки волонтера по мероприятию #question (?) #answer Список значений хранит, что может выбрать администратор и указывать у пользователя, который подал заявку на мероприятие.
 */
class Statuses extends Migration
{
    private $tableName = 'Statuses';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // название статуса(в ожидании, отклонен, принят, в резерве, принял участие, отказался от участия, не пришел - не уведомил)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
