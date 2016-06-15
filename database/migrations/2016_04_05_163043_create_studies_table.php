<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Study
 * таблица образовательных учреждений пользователя
 */
class CreateStudiesTable extends Migration
{
    private $tableName = 'studies';

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
            $table->string('place_name'); // название образов. учреждения
            $table->timestamp('time_start'); // время начала
            $table->timestamp('time_end'); // время окончания
            $table->string('group'); // класс(школа) или группа(универ)
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
