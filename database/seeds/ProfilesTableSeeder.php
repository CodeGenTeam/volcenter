<?php

use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            ['user_id'=>'1','profile_type_id'=>'1','link'=>'321244'],
            ['user_id'=>'1','profile_type_id'=>'2','link'=>'kds3'],
            ['user_id'=>'2','profile_type_id'=>'1','link'=>'321144'],
            ['user_id'=>'2','profile_type_id'=>'2','link'=>'dfs4'],
            ['user_id'=>'3','profile_type_id'=>'1','link'=>'2544'],
            ['user_id'=>'3','profile_type_id'=>'2','link'=>'dfsfrew'],
            ['user_id'=>'4','profile_type_id'=>'1','link'=>'3244'],
            ['user_id'=>'4','profile_type_id'=>'2','link'=>'2dsaeq'],
            ['user_id'=>'5','profile_type_id'=>'1','link'=>'341144'],
            ['user_id'=>'5','profile_type_id'=>'2','link'=>'fds4s'],
        ];

        foreach ($profiles as $value) {
            DB::table('profiles')->insert([
                'user_id' => $value['user_id'],
                'profile_type_id' => $value['profile_type_id'],
                'link' => $value['link'],
            ]);
        }
    }
}
