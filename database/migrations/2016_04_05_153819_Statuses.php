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
            $table->integer('id')->unique();
            $table->string('name'); // название статуса(в ожидании, отклонен, принят, в резерве, принял участие, отказался от участия, не пришел - не уведомил)
            // Подал заявку
            // Принято
            // Отменил пользователь
            // Отклонено администратором
            // Не пришёл на мероприятие
            // Принял участие в мероприятии
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
