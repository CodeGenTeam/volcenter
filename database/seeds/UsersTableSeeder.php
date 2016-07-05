<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['login'=>'gek','email'=>'gek@volcenter.ru','firstname'=>'Александр','lastname'=>'Шишкин','middlename'=>'Александрович','birthday'=> '03.06.1998' ,'password'=>'123456','role_id'=>'1'],
            ['login'=>'ss2','email'=>'ss2@volcenter.ru','firstname'=>'Виктор','lastname'=>'Пишкин','middlename'=>'Вкиторович','birthday'=>'05.03.1999','password'=>'123456','role_id'=>'1'],
            ['login'=>'fas3','email'=>'fas3@volcenter.ru','firstname'=>'Иван','lastname'=>'Кигич','middlename'=>'Петрович','birthday'=>'02.06.2001','password'=>'123456','role_id'=>'1'],
            ['login'=>'2rss','email'=>'2rss@volcenter.ru','firstname'=>'Григорий','lastname'=>'Шестин','middlename'=>'Векторович','birthday'=>'12.03.1991','password'=>'123456','role_id'=>'2'],
            ['login'=>'svcw','email'=>'svcw@volcenter.ru','firstname'=>'Александр','lastname'=>'Бледин','middlename'=>'Владиславович','birthday'=>'21.03.1980','password'=>'123456','role_id'=>'3'],
        ];

        foreach ($users as $value) {
            DB::table('users')->insert([
                'username' => $value['login'],
                'email'=> $value['email'],
                'firstname'=> $value['firstname'],
                'lastname'=> $value['lastname'],
                'middlename'=> $value['middlename'],
                'birthday'=> date('Y-m-d', strtotime($value['birthday'])),
                'password'=> Hash::make($value['password']),
                'role_id'=> $value['role_id']
            ]);
        }
    }
}
