<?php

use Illuminate\Database\Seeder;

class ResponsibilityEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responsibility_events = [
            ['event_id'=>'1','responsibility_id'=>'1'],
            ['event_id'=>'1','responsibility_id'=>'2'],
            ['event_id'=>'1','responsibility_id'=>'3'],
            ['event_id'=>'2','responsibility_id'=>'2'],
            ['event_id'=>'2','responsibility_id'=>'3'],
            ['event_id'=>'2','responsibility_id'=>'4'],
            ['event_id'=>'3','responsibility_id'=>'3'],
            ['event_id'=>'3','responsibility_id'=>'4'],
            ['event_id'=>'4','responsibility_id'=>'1'],
            ['event_id'=>'4','responsibility_id'=>'2'],
        ];
        foreach ($responsibility_events as $value) {
            DB::table('responsibility_events')->insert([
                'event_id' => $value['event_id'],
                'responsibility_id' => $value['responsibility_id'],
            ]);
        }
    }
}
