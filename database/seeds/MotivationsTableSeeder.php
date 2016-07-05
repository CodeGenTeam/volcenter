<?php

use Illuminate\Database\Seeder;

class MotivationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivations = [
            ['name'=>'Униформа с символикой мероприятия'],
            ['name'=>'Обеспечение питанием'],
            ['name'=>'Благодарственные письма от организаторов мероприятия'],
            ['name'=>'Баллы на ваш личный счёт']
        ];
        foreach ($motivations as $value) {
            DB::table('motivations')->insert([
                'name' => $value['name']
            ]);
        }
    }
}
