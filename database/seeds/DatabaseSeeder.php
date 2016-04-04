<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Sevents = ['myevent' => 2, 'someevent' => 2, 'omgevent' => 1, 'pizdes' => 3, 'test' => 3];
        $Seventt = [1 => 'puck', 2 => 'hh', 3 => 'mocha'];

        foreach ($Seventt as $id => $name) DB::table('events_types')->insert(['id' => $id, 'name' => $name]);
        foreach ($Sevents as $name => $id) DB::table('events')->insert(['name' => $name, 'event_type' => $id]);
    }
}
