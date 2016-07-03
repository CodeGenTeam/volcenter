<?php

use Illuminate\Database\Seeder;

class StudyUniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //направление(факультет), специальность(кафедра)
        $study_university = [
            ['study_id'=>'1','faculty'=>'Энергетический','chair'=>'Высокой энергии'],
            ['study_id'=>'2','faculty'=>'Лингвистика','chair'=>'Перевод и переводоведение'],
            ['study_id'=>'5','faculty'=>'Экономическое','chair'=>'Экономика и бухгалтерский учет'],
        ];

        foreach ($study_university as $value) {
            DB::table('study_universities')->insert([
                'study_id'=>$value['study_id'],
                'faculty'=>$value['faculty'],
                'chair'=>$value['chair'],
            ]);
        }
    }
}
