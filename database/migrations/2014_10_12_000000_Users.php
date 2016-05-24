<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    private $tableName = 'Users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('login')->uneque();
            $table->string('email')->unique();
            $table->string('firstname'); // Имя
            $table->string('lastname'); // Фамилия
            $table->string('middlename'); // Отчество
            $table->timestamp('birthday')->default(DB::raw('0')); // др
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->tableName);
    }
}
