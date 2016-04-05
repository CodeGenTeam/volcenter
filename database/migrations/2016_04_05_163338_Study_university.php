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
            $table->integer('study_id'); // идентификатор образовательного учреждения (предыдущая таблица)
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
        Schema::dropIfExists($this->tableName);
    }
}
