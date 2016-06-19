<?php

use Illuminate\Database\Seeder;
use \App\Models\Status;
use \App\Permissions\Pex;
use \App\Permissions\Models\Permission_group;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $type_names = ['Промо-акции', 'Спортивно-массовые', 'Социально-значимые'];
        foreach ($type_names as $value) {
            DB::table('event_types')->insert([
                'name' => $value
            ]);
        }

        $events = [
            ['name'=>'Гастрономический фестиваль "О, ДА! ЕДА!"','descr'=>'18-19 июня 2016 года Плотинка превратится в огромный пикник, где найдется место и развлечения для всех. 
Гостям представится возможность:
- попробовать блюда из особого фестивального меню от лучших рестораторов Урала;
- стать зрителем ярких Кулинарных поединков среди ресторанов;
- принять участие в бесплатных мастер-классах и спортивных активностях;
- вместе с инструкторами заняться йогой на открытом воздухе;
- научиться играть в панна футбол;
- вдохновиться и получить урок настоящей бразильской Капоэйры и др.
Помимо гастрономических активностей гостей ждут живые выступления любимых музыкантов. 
Хедлайнеры фестиваля группа "АлоэВера" и Коля ROTOFF

Обращаем ваше внимание волонтеру необходимо быть минимум на 2-х сменах! (Каждый день делится на две смены).
Обязательное обучение для волонтеров 16 июня!','address'=>'Исторический сквер Екатеринбурга
','image'=>'','event_start'=>'2016-06-22 00:00:00','event_end'=>'2016-06-22 00:00:00','event_start_register_user'=>'2016-06-22 00:00:00','event_stop_register_user'=>'2016-06-22 00:00:00','event_type'=>'3'],
            ['name'=>'Спартакиада "Ростелеком"','descr'=>'В спартакиаде примут участие 8 сборных из числа сотрудников дирекции макрорегионального филиала "Урал" ОАО "Ростелеком" и региональных филиалов (Свердловская, Челябинская, Курганская, Тюменская области, Ханты-Мансийский и Ямало-Ненецкий автономные округа и Пермский край). За звание лучших команды поборются в трех видах спорта: настольный теннис, волейбол и мини-футбол.
            ','address'=>'ДС УГМК (В.Пышма)','image'=>'','event_start'=>'2016-06-22 00:00:00','event_end'=>'2016-06-22 00:00:00','event_start_register_user'=>'2016-06-22 00:00:00','event_stop_register_user'=>'2016-06-22 00:00:00','event_type'=>'3'],
            ['name'=>'Программа "Buddy"','descr'=>'Занятость: от 4 до 10 часов в неделю
Служба поддержки иностранных обучающихся «Бадди Систем УрФУ» создана в 2014 году. Основной целью службы является встреча и сопровождение иностранных обучающихся в УрФУ, оказание помощи в их адаптации в университете и в внеучебной жизни, а также содействие развитию межкультурных компетенций у студентов УрФУ. В 2015/2016 учебном году волонтеры проекта «Бадди Систем УрФУ» встретили больше 700 новоприбывших иностранных обучающихся из более, чем 60 стран. Это для нас огромное достижение, которого мы добились большим трудом! Мы не хотим на этом останавливаться, поэтому и сейчас мы ищем новых бадди в нашу команду :)

Задачи волонтера-buddy:
- после получения информации от своего тимлидера, связаться со своим студентом до его приезда — возможно нужно будет ответить на вопросы (о городе, о России, о погоде и т. д.)
- встретить своего студента в аэропорту/ на жд или автовокзале
- помочь студенту пройти все процедуры на поселение в общежитие, регистрацию, оформление документов об обучении/страхового полиса, приобрести местную сим-карту (эти задания можно сделать за день - два) 
- показать студенту место, где он будет учиться, а также важные места поблизости от его места проживания (аптека, магазин, и др.)
- встречаться со студентом регулярно в течение первого семестра после его/ ее приезда и помогать ему/ей не только адаптироваться, но и погрузиться в замечательную жизнь нашего университета и города Екатеринбурга :)

Каких волонтеров мы ищем?:
✔ высоко мотивированных — проект продолжительный и хорошая мотивация для этого очень нужна ;)
✔ ответственных — когда вы станете бадди для иностранных студентов, в первую неделю - две после приезда, вы станете самым важным человеком в этом городе для них. Это нужно хорошо понимать.
✔ владеющих иностранными языками — мы не ищем филологов, но так как многие из наших иностранных студентов не говорят по-русски, будет необходимо разговорное владение иностранных языков (самый употребляемый язык у нас — английский, но также может пригодиться и знание китайского/ арабского/ французского/ испанского языка)
✔ позитивных, любознательных, открытых к миру — правда, что студенты приезжают сюда учиться, но с другой стороны они сами могут много чего рассказать и научить своего бадди. 

Если вы готовы путешествовать по миру, не уходя из своего города, то будем рады увидеть вас в своей команде :)
','address'=>'УрФУ','image'=>'','event_start'=>'2016-06-22 00:00:00','event_end'=>'2016-06-22 00:00:00','event_start_register_user'=>'2016-06-22 00:00:00','event_stop_register_user'=>'2016-06-22 00:00:00','event_type'=>'1'],
            ['name'=>'«Гонка Героев» 2016','descr'=>'30 и 31 июля 2016 года в Екатеринбурге на полигоне "Свердловский" пройдет долгожданная "Гонка Героев-2016"!
"Гонка героев" — первая спортивная гонка всероссийского масштаба, созданная по нормативам ГТО для людей всех возрастов и уровней подготовки представляющая из себя бег по пересечённой местности с преодолением различных препятствий.
','address'=>'Полигон "Свердловский"','image'=>'','event_start'=>'2016-06-22 00:00:00','event_end'=>'2016-06-22 00:00:00','event_start_register_user'=>'2016-06-22 00:00:00','event_stop_register_user'=>'2016-06-22 00:00:00','event_type'=>'2'],
            ['name'=>'"Стань человеком" 2016','descr'=>'Спортивно-массовое мероприятие. «Стань человеком 5» - это увлекательное продолжение зарекомендовавшей себя серии забегов с испытаниями. Если ты тренируешься на пределе возможностей, не привык пасовать перед неожиданными препятствиями и готов проверить себя на прочность, собирай команду единомышленников и участвуй в уникальном фитнес-соревновании.
Обязательное обучение - 9 июля 2016 года, парк ЦПКиО.','address'=>'','image'=>'','event_start'=>'2016-06-22 00:00:00','event_end'=>'2016-06-22 00:00:00','event_start_register_user'=>'2016-06-22 00:00:00','event_stop_register_user'=>'2016-06-22 00:00:00','event_type'=>'2'],
        ];
        foreach ($events as $value) {
            DB::table('events')->insert([
                'name' => $value['name'],
                'descr'=> $value['descr'],
                'address'=> $value['address'],
                'image'=> $value['image'],
                'event_start'=> $value['event_start'],
                'event_end'=> $value['event_end'],
                'event_start_register_user'=> $value['event_start_register_user'],
                'event_stop_register_user'=> $value['event_stop_register_user'],
                'event_type'=> $value['event_type']
            ]);
        }
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

        $responsibilities = [
            ['position'=>'Аккредитация','task'=>'Помощь в изготовлении и выдаче аккредитаций и пакетов сувенирной атрибутики для всех клиентских групп мероприятия (участников, официальных лиц, судей, гостей и волонтёров)','count'=>'10'],
            ['position'=>'Спортивная программа','task'=>'Помощь в организации и проведении спортивных соревнований','count'=>'30'],
            ['position'=>'Логистика','task'=>'Выдача всем клиентским группам мероприятия необходимого инвентаря, контроль обеспечения объектов инфраструктуры мероприятия канцелярскими товарами, оргтехникой и прочим необходимым оборудованием.','count'=>'10'],
            ['position'=>'Услуги для зрителей','task'=>'Помощь на объектах инфраструктуры, задействованных на мероприятии, работа на информационных стойках, рассадка зрителей, помощь в билетной программе и проведении параллельных активностей','count'=>'20']
        ];
        foreach ($responsibilities as $value) {
            DB::table('responsibilities')->insert([
                'position' => $value['position'],
                'task' => $value['task'],
                'count' => $value['count']
            ]);
        }
        $responsibility_events = [
            ['event_id'=>'1','responsibility_id'=>'1'],
            ['event_id'=>'1','responsibility_id'=>'2'],
            ['event_id'=>'1','responsibility_id'=>'3'],
            ['event_id'=>'2','responsibility_id'=>'2'],
            ['event_id'=>'2','responsibility_id'=>'3'],
            ['event_id'=>'2','responsibility_id'=>'4'],
            ['event_id'=>'3','responsibility_id'=>'3'],
            ['event_id'=>'3','responsibility_id'=>'4'],
            ['event_id'=>'4','responsibility_id'=>'1'],
            ['event_id'=>'4','responsibility_id'=>'2'],
        ];
        foreach ($responsibility_events as $value) {
            DB::table('responsibility_events')->insert([
                'event_id' => $value['event_id'],
                'responsibility_id' => $value['responsibility_id'],
            ]);
        }

        $motivation_events = [
            ['event_id'=>'1','motivation_id'=>'1'],
            ['event_id'=>'1','motivation_id'=>'2'],
            ['event_id'=>'1','motivation_id'=>'3'],
            ['event_id'=>'2','motivation_id'=>'2'],
            ['event_id'=>'2','motivation_id'=>'3'],
            ['event_id'=>'2','motivation_id'=>'4'],
            ['event_id'=>'3','motivation_id'=>'3'],
            ['event_id'=>'3','motivation_id'=>'4'],
            ['event_id'=>'4','motivation_id'=>'1'],
            ['event_id'=>'4','motivation_id'=>'2'],
        ];
        foreach ($motivation_events as $value) {
            DB::table('motivation_events')->insert([
                'event_id' => $value['event_id'],
                'motivation_id' => $value['motivation_id'],
            ]);
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

        $groups = ['guest','user','moderator','admin'];
        foreach ($groups as $group) {
            Permission_group::where('name', $group)->firstOrCreate(['name'=>$group,'descr'=>'']);
        }
        $rules = Pex::groupRules('admin');
        $rules->addRule('*');
    }
}
