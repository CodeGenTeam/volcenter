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
            $table->foreign('event_type')->references('id')->on('Event_types')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('applications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('Events')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('Statuses')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('profile_type_id')->references('id')->on('Profile_types')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('language_levels', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('Languages')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('clothes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('addreses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('studies', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('study_universities', function (Blueprint $table) {
            $table->foreign('study_id')->references('id')->on('Studies')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('motivation_events', function (Blueprint $table) {
            $table->foreign('motivation_id')->references('id')->on('Motivations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('Events')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('responsibility_events', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('Events')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('responsibility_id')->references('id')->on('Responsibilities')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('UserPermissions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('permission_id')->references('id')->on('Permissions')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('GroupPermissions', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('PermissionGroups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('permission_id')->references('id')->on('Permissions')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('UserGroupAccessory', function (Blueprint $table) {
            $table->foreign('group_id')->references('id')->on('PermissionGroups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
        });
		Schema::table('place_works', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
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
