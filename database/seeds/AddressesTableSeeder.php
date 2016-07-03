<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addreses = [
            ['user_id'=>'1','country'=>'Россия','city'=>'Челябинск','street'=>'Ленина, 63','house'=>'5','ext'=>'','flat'=>'10'],
            ['user_id'=>'2','country'=>'Казахстан','city'=>'Астана','street'=>'Кузнецова, 13','house'=>'1','ext'=>'','flat'=>'4'],
            ['user_id'=>'3','country'=>'Россия','city'=>'Тюмень','street'=>'Шестеренко, 1','house'=>'34','ext'=>'а','flat'=>'5'],
            ['user_id'=>'4','country'=>'Россия','city'=>'Чебаркуль','street'=>'Перельван, 3','house'=>'4','ext'=>'','flat'=>'9'],
            ['user_id'=>'5','country'=>'Россия','city'=>'Копейск','street'=>'Гонечная, 14','house'=>'2','ext'=>'2','flat'=>'23']
        ];

        foreach ($addreses as $value) {
            DB::table('addresses')->insert([
                'user_id' => $value['user_id'],
                'country'=>$value['country'],
                'city'=>$value['city'],
                'street'=>$value['street'],
                'house'=>$value['house'],
                'ext'=>$value['ext'],
                'flat'=>$value['flat']
            ]);
        }
    }
}
