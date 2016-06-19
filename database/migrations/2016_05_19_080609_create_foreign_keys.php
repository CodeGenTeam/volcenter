<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('event_type')->references('id')->on('event_types')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('applications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('responsibility_event_id')->references('id')->on('responsibility_events')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('profile_type_id')->references('id')->on('profile_types')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('language_levels', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('level_language_id')->references('id')->on('level_languages')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('addreses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('studies', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('study_universities', function (Blueprint $table) {
            $table->foreign('study_id')->references('id')->on('studies')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('motivation_events', function (Blueprint $table) {
            $table->foreign('motivation_id')->references('id')->on('motivations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('responsibility_events', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('responsibility_id')->references('id')->on('responsibilities')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('phones', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
