<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_names = ['Промо-акции', 'Спортивно-массовые', 'Социально-значимые'];
        foreach ($type_names as $value) {
            DB::table('event_types')->insert([
                'name' => $value
            ]);
        }
    }
}
