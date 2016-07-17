<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $t) {
            $t->increments('id');
            $t->string('title');
            $t->longText('content');
            $t->integer('created_by')->unsigned();
            $t->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
