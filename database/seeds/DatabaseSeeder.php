<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Event types
        foreach (
            ['myevent' => 2, 'someevent' => 2, 'omgevent' => 1, 'test1' => 3, 'test2' => 3] as
            $id => $name
        ) {
            DB::table('Events_type')->insert(['id' => $id, 'name' => $name]);
        }

        // Test events
        foreach (
            ['myevent' => 2, 'someevent' => 2, 'omgevent' => 1, 'eeevent' => 3, 'test' => 3] as
            $name => $id
        ) {
            DB::table('Events')->insert(['name' => $name, 'event_type' => $id]);
        }

        // Подал заявку
        // Принято
        // Отменил пользователь
        // Отклонено администратором
        // Не пришёл на мероприятие
        // Принял участие в мероприятии
        foreach (
            [1 => 'Подал заявку', 2 => 'Отменил заявку', 3 => 'Принято администратором',
                4 => 'Отклонено администратором', 5 => 'Принял участие в мероприятии', 6 => 'Не пришёл на мероприятие'] as
            $id => $name
        ) {
            DB::table('Statuses')->insert(['id' => $id, 'name' => $name]);
        }
    }
}
