<?php

use Illuminate\Database\Seeder;

class LanguageLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $language_levels = [
            ['user_id'=>'1','language_id'=>'2','level_language_id'=>'2'],
            ['user_id'=>'2','language_id'=>'2','level_language_id'=>'1'],
            ['user_id'=>'3','language_id'=>'2','level_language_id'=>'3'],
            ['user_id'=>'4','language_id'=>'2','level_language_id'=>'4'],
            ['user_id'=>'5','language_id'=>'2','level_language_id'=>'5'],
        ];

        foreach ($language_levels as $value) {
            DB::table('language_levels')->insert([
                'user_id'=>$value['user_id'],
                'language_id'=>$value['language_id'],
                'level_language_id'=>$value['level_language_id']
            ]);
        }
    }
}
