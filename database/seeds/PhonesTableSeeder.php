<?php

use Illuminate\Database\Seeder;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phones = [
            ['user_id'=>'1','phone'=>'89251454317'],
            ['user_id'=>'2','phone'=>'89015452351'],
            ['user_id'=>'3','phone'=>'89351432857'],
            ['user_id'=>'4','phone'=>'89151152357'],
            ['user_id'=>'5','phone'=>'89231447357'],
        ];

        foreach ($phones as $value) {
            DB::table('phones')->insert([
                'user_id' => $value['user_id'],
                'phone'=>$value['phone']
            ]);
        }
    }
}
