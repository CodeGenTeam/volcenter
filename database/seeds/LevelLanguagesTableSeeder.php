<?php

use Illuminate\Database\Seeder;

class LevelLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $level_languages = [
            ['name'=>'Начальный'],
            ['name'=>'Ниже среднего'],
            ['name'=>'Средний'],
            ['name'=>'Выше среднего'],
            ['name'=>'Продвинутый'],
        ];

        foreach ($level_languages as $value) {
            DB::table('level_languages')->insert([
                'name' => $value['name']
            ]);
        }
    }
}
