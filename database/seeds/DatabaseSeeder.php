<?php

use Illuminate\Database\Seeder;
use \App\Models\Event_type;
use \App\Models\Event;
use \App\Models\Status;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Event types
        foreach (
            ['mytyoe', 'sometype', 'omgtype', 'test1', 'test2'] as
            $name
        ) {
            Event_type::where(['name' => $name])->firstOrCreate(['name' => $name]);
        }

        // Test events
        foreach (
            ['myevent' => 'mytyoe', 'someevent' => 'sometype', 'omgevent' => 'omgtype', 'eeevent' => 'test1', 'test' => 'test2'] as
            $name => $id
        ) {
            Event::where(['name' => $name, 'event_type' => Event_type::find($id)])->firstOrCreate(['name' => $name, 'event_type' => $id]);
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
            Status::where(['id' => $id, 'name' => $name])->firstOrCreate(['id' => $id, 'name' => $name]);
        }

        $permissions = [
            'permissions.user.rule.check' => 'проверить разрешение на себе',
            'permissions.user.rule.check.other' => 'проверить разрешение на других',
            'permissions.user.rule.get' => 'получить свой список разрешений',
            'permissions.user.rule.get.other' => 'получить список рахрешений другого',
            'permissions.user.group.get' => 'получить свои группы',
            'permissions.user.group.get.other' => 'получить группы другого',
            'permissions.user.rule.add' => 'добавить разрешение пользователю',
            'permissions.user.rule.remove' => 'удалять разрешение пользователя',
            'permissions.group.info' => 'получить инфу о соей группе',
            'permissions.group.info.other' => 'получить инфу о конкретной группе',
            'permissions.group.rule.add' => 'добавление разрешения для группы',
            'permissions.group.rule.remove' => 'удаление разрешения для группы',
            'permissions.group.create' => 'создание группы',
            'permissions.group.remove' => 'удаление группы',
        ];

        foreach ($permissions as $rule => $descr) Pex::getOrCreateRule($rule, $descr);
    }
}
