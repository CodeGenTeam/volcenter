<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Подал заявку
        // Отменил заявку
        // Принято администратором
        // Отклонено администратором
        // Не пришёл на мероприятие
        // Принял участие в мероприятии
        foreach (
            [1 => 'Подал заявку', 2 => 'Отменил заявку', 3 => 'Принято администратором',
                4 => 'Отклонено администратором', 5 => 'Принял участие в мероприятии', 6 => 'Не пришёл на мероприятие'] as
            $id => $name
        ) {
            Status::where(['id' => $id, 'name' => $name])->firstOrCreate(['id' => $id, 'name' => $name]);
        }
    }
}
