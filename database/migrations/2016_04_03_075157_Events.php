<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
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
            $table->string('descr')->nullable(); // описание мероприятия
            $table->string('address')->nullable(); // где пройдет мероприятие

            $table->timestamp('event_start')->useCurrent(); // дата и время начала
            $table->timestamp('event_end')->default(DB::raw('0')); // дата и время окончания

            $table->integer('event_type')->default(0); // тип мероприятия
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
