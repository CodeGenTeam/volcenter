<?php

use Illuminate\Database\Seeder;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studies = [
            ['user_id'=>'1','place_name'=>'ЮУрГУ','time_start'=>'2012','time_stop'=>'2016','group'=>'Э-105'],
            ['user_id'=>'2','place_name'=>'ЧГПУ','time_start'=>'2012','time_stop'=>'2016','group'=>'Л-225'],
            ['user_id'=>'3','place_name'=>'СОШ №2','time_start'=>'2012','time_stop'=>'2016','group'=>'8а'],
            ['user_id'=>'4','place_name'=>'СОШ №120','time_start'=>'2012','time_stop'=>'2016','group'=>'9в'],
            ['user_id'=>'5','place_name'=>'Колледж права и экономики','time_start'=>'2012','time_stop'=>'2016','group'=>'Э-203'],
        ];

        foreach ($studies as $value) {
            DB::table('studies')->insert([
                'user_id'=> $value['user_id'],
                'place_name'=> $value['place_name'],
                'time_start'=> date('Y-m-d', strtotime($value['time_start'])),
                'time_stop'=> date('Y-m-d', strtotime($value['time_stop'])),
                'group'=> $value['group'],
            ]);
        }
    }
}
