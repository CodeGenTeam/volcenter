<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class LanguageLevel
 * таблица уровней языков
 */
class LanguageLevel extends Migration
{
    private $tableName = 'Language_level';

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
            $table->integer('language_id'); // язык
            $table->integer('mark'); // оценка уровня владения языка (начальный, элементарный, средний, ниже среднего, средний, выше среднего, продвинутый, профессиональный)
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
