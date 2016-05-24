<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class StudyUniversity
 * таблица для хранения инф. о ВУЗе
 */
class StudyUniversity extends Migration
{
    private $tableName = 'Study_university';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('study_id')->unsigned(); // идентификатор образовательного учреждения (предыдущая таблица)
            $table->string('faculty'); // факультет
            $table->string('chair'); // кафедра
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
