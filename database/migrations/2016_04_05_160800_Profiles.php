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
            $table->integer('user_id'); // пользователь
            $table->integer('profile_type_id'); // тип добавляемого профиля (телефон, соц. сеть vk, facebook..)
            $table->string('profile_type_id'); // строка профиля(ссылка, номер телефона..)
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
