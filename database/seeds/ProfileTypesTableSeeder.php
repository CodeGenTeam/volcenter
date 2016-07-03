<?php

use Illuminate\Database\Seeder;

class ProfileTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $profile_types = [
            ['name'=>'Вконтакте'],
            ['name'=>'Skype'],
        ];

        foreach ($profile_types as $value) {
            DB::table('profile_types')->insert([
                'name' => $value['name'],
            ]);
        }
    }
}
