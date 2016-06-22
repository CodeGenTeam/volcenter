<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{

    private $tableName = 'events';

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
            $table->text('descr'); // описание мероприятия
            $table->string('address'); // где пройдет мероприятие
            $table->string('image'); // Фотография мероприятия
            $table->timestamp('event_start'); // дата и время начала
            $table->timestamp('event_stop'); // дата и время окончания
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
