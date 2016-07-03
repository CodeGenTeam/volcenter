<?php

use Illuminate\Database\Seeder;

class MotivationEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivation_events = [
            ['event_id'=>'1','motivation_id'=>'1'],
            ['event_id'=>'1','motivation_id'=>'2'],
            ['event_id'=>'1','motivation_id'=>'3'],
            ['event_id'=>'2','motivation_id'=>'2'],
            ['event_id'=>'2','motivation_id'=>'3'],
            ['event_id'=>'2','motivation_id'=>'4'],
            ['event_id'=>'3','motivation_id'=>'3'],
            ['event_id'=>'3','motivation_id'=>'4'],
            ['event_id'=>'4','motivation_id'=>'1'],
            ['event_id'=>'4','motivation_id'=>'2'],
        ];
        foreach ($motivation_events as $value) {
            DB::table('motivation_events')->insert([
                'event_id' => $value['event_id'],
                'motivation_id' => $value['motivation_id'],
            ]);
        }
    }
}
