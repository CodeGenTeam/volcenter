<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsibilitiesTable extends Migration
{
    private $tableName = 'responsibilities';

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
            $table->text('task'); // описание задачи позиции
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($this->tableName);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
