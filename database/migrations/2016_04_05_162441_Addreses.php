<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Addreses
 * таблица адресов
 */
class Addreses extends Migration
{
    private $tableName = 'Addreses';

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
            $table->string('country'); // страна
            $table->string('city'); // город
            $table->string('street'); // улица
            $table->integer('house'); // номер дома
            $table->string('ext'); // для добавочного кода к дому, например: 51а, 23/2 (храним 'а', '2')
            $table->integer('flat'); // квартира
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
