<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Study
 * таблица образовательных учреждений пользователя
 */
class Study extends Migration
{
    private $tableName = 'Study';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); // пользователь
            $table->string('place_name'); // название образов. учреждения
            $table->timestamp('time_start'); // время начала
            $table->timestamp('time_end'); // время окончания
            $table->timestamp('group'); // класс(школа) или группа(универ)
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
