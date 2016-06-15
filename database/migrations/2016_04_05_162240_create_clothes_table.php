<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Clothes
 * таблица размеров одежды пользователя
 */
class CreateClothesTable extends Migration
{
    private $tableName = 'clothes';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // юзер
            $table->integer('size_clothes'); // размер одежды (пусть будет XXS, XS..,XL - берем из списка)
            $table->integer('size_foot'); // размер обуви
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
