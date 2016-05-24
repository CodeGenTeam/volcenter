<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class Profiles
 * таблица профилей(телефон, соц. сети)
 */
class Profiles extends Migration
{
    private $tableName = 'Profiles';

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
            $table->integer('profile_type_id')->unsigned(); // тип добавляемого профиля (телефон, соц. сеть vk, facebook..)
            $table->string('link'); // строка профиля(ссылка, номер телефона..)
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
