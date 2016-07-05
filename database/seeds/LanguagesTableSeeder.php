<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['lang_name'=>'Французский'],
            ['lang_name'=>'Английский'],
            ['lang_name'=>'Немецкий'],
            ['lang_name'=>'Испанский'],
            ['lang_name'=>'Китайский'],
        ];

        foreach ($languages as $value) {
            DB::table('languages')->insert([
                'lang_name' => $value['lang_name']
            ]);
        }
    }
}
