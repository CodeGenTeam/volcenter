<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Events', function (Blueprint $table) {
            $table->foreign('event_type')->references('id')->on('Events_type')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Applications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('Events')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('status_id')->references('id')->on('Statuses')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Profiles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('profile_type_id')->references('id')->on('Profiles_types')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Language_level', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->references('id')->on('Languages')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Clothes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Addreses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Study', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('Users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Study_university', function (Blueprint $table) {
            $table->foreign('study_id')->references('id')->on('Study')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Motivations_events', function (Blueprint $table) {
            $table->foreign('motivation_id')->references('id')->on('Motivations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('event_id')->references('id')->on('Events')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('Responsibilities_events', function (Blueprint $table) {
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
