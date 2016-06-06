<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{

    private $tableName = 'Events';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');

            $table->string('name'); // название мероприятия
            $table->string('descr')->nullable(); // описание мероприятия
            $table->string('address')->nullable(); // где пройдет мероприятие
            $table->string('image')->nullable(); // Фотография мероприятия

            $table->timestamp('event_start'); // дата и время начала
            $table->timestamp('event_end'); // дата и время окончания
            $table->timestamp('event_stop_register_user'); // дата/время прекращения набора в волонтёры

            $table->integer('event_type')->unsigned(); // тип мероприятия
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
