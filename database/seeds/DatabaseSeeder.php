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
        // Event types
        foreach (
            ['myevent' => 2, 'someevent' => 2, 'omgevent' => 1, 'test1' => 3, 'test2' => 3] as
            $id => $name
        ) {
            DB::table('Events_type')->insert(['id' => $id, 'name' => $name]);
        }

        // Test events
        foreach (
            ['myevent' => 2, 'someevent' => 2, 'omgevent' => 1, 'eeevent' => 3, 'test' => 3] as
            $name => $id
        ) {
            DB::table('Events')->insert(['name' => $name, 'event_type' => $id]);
        }

        // Application types
        foreach (
            [1 => 'inwait', 2 => 'rejected', 3 => 'reserved',
                4 => 'accepted', 5 => 'refuse', 6 => 'leave'] as
            $id => $name
        ) {
            DB::table('Statuses')->insert(['id' => $id, 'name' => $name]);
        }
    }
}
