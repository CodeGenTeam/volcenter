<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Responsibilities extends Migration
{
    private $tableName = 'Responsibilities';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('position'); // название позиции (аташе, team leader, логистика..)
            $table->string('task'); // описание задачи позиции
            $table->string('position'); // описание задачи позиции
            $table->string('count'); // требуемое кол-во волонтеров
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
