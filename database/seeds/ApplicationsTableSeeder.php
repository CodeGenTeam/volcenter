<?php

use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $applications = [
            //подал и отменил
            ['user_id'=>'2','responsibility_event_id'=>'3','status_id'=>'1','datetime'=>'03.02.2016 18:00:03'],
            ['user_id'=>'2','responsibility_event_id'=>'3','status_id'=>'2','datetime'=>'03.02.2016 20:00:03'],
            //подал и отменил
            ['user_id'=>'1','responsibility_event_id'=>'1','status_id'=>'1','datetime'=>'03.02.2016 18:00:03'],
            ['user_id'=>'1','responsibility_event_id'=>'1','status_id'=>'2','datetime'=>'03.02.2016 19:00:03'],
            //подал
            ['user_id'=>'1','responsibility_event_id'=>'2','status_id'=>'1','datetime'=>'03.02.2016 19:01:03'],
            //подал
            ['user_id'=>'2','responsibility_event_id'=>'2','status_id'=>'1','datetime'=>'03.02.2016 20:00:05'],
            // подал и подтвердил админ
            ['user_id'=>'3','responsibility_event_id'=>'1','status_id'=>'1','datetime'=>'03.02.2016 20:02:08'],
            ['user_id'=>'3','responsibility_event_id'=>'1','status_id'=>'3','datetime'=>'03.02.2016 20:03:03'],
            // подал и подтвердил админ
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'1','datetime'=>'03.02.2016 21:00:03'],
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'3','datetime'=>'03.02.2016 21:01:17'],
            // подал и отклонил админ
            ['user_id'=>'3','responsibility_event_id'=>'5','status_id'=>'1','datetime'=>'03.02.2016 22:00:03'],
            ['user_id'=>'3','responsibility_event_id'=>'5','status_id'=>'4','datetime'=>'03.02.2016 22:01:03'],
            // подал и отклонил админ
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'1','datetime'=>'03.02.2016 22:11:03'],
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'4','datetime'=>'03.02.2016 22:13:03'],
            // подал, принял админ, принял участие
            ['user_id'=>'5','responsibility_event_id'=>'8','status_id'=>'1','datetime'=>'04.02.2016 14:01:03'],
            ['user_id'=>'5','responsibility_event_id'=>'8','status_id'=>'3','datetime'=>'04.02.2016 14:11:03'],
            ['user_id'=>'5','responsibility_event_id'=>'8','status_id'=>'5','datetime'=>'04.02.2016 14:13:03'],
            // подал, принял админ, принял участие
            ['user_id'=>'1','responsibility_event_id'=>'9','status_id'=>'1','datetime'=>'04.03.2016 14:01:03'],
            ['user_id'=>'1','responsibility_event_id'=>'9','status_id'=>'3','datetime'=>'04.03.2016 14:11:03'],
            ['user_id'=>'1','responsibility_event_id'=>'9','status_id'=>'5','datetime'=>'04.03.2016 14:13:03'],
            // подал, принял админ, принял участие
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'1','datetime'=>'04.03.2016 14:01:03'],
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'3','datetime'=>'04.03.2016 14:11:03'],
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'5','datetime'=>'04.03.2016 14:13:03'],
            // подал, принял админ, не пришел
            ['user_id'=>'1','responsibility_event_id'=>'4','status_id'=>'1','datetime'=>'05.03.2016 14:01:03'],
            ['user_id'=>'1','responsibility_event_id'=>'4','status_id'=>'3','datetime'=>'05.03.2016 14:11:03'],
            ['user_id'=>'1','responsibility_event_id'=>'4','status_id'=>'6','datetime'=>'05.03.2016 14:13:03'],
            // подал, принял админ, не пришел
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'1','datetime'=>'06.03.2016 14:01:03'],
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'3','datetime'=>'06.03.2016 14:11:03'],
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'6','datetime'=>'06.03.2016 14:13:03'],
        ];

        foreach ($applications as $value) {
            DB::table('applications')->insert([
                'user_id' => $value['user_id'],
                'responsibility_event_id'=> $value['responsibility_event_id'],
                'status_id'=> $value['status_id'],
                'datetime'=> date('Y-m-d h:i:s', strtotime($value['datetime'])),
            ]);
        }
    }
}
