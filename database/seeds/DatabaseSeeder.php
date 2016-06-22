<?php

use Illuminate\Database\Seeder;
use \App\Models\Status;
use \App\Models\Role;

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
                'event_start'=> date('Y-m-d h:i:s', strtotime($value['event_start'])),
                'event_stop'=> date('Y-m-d h:i:s', strtotime($value['event_end'])),
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
        foreach (
            [1 => 'user', 2 => 'moderator', 3 => 'admin'] as
            $id => $name
        ) {
            Role::where(['id' => $id, 'name' => $name])->firstOrCreate(['id' => $id, 'name' => $name]);
        }

        $users = [
            ['login'=>'gek','email'=>'gek@volcenter.ru','firstname'=>'Александр','lastname'=>'Шишкин','middlename'=>'Александрович','birthday'=> '03.06.1998' ,'password'=>bcrypt('123456'),'role_id'=>'1'],
            ['login'=>'ss2','email'=>'ss2@volcenter.ru','firstname'=>'Виктор','lastname'=>'Пишкин','middlename'=>'Вкиторович','birthday'=>'05.03.1999','password'=>bcrypt('123456'),'role_id'=>'1'],
            ['login'=>'fas3','email'=>'fas3@volcenter.ru','firstname'=>'Иван','lastname'=>'Кигич','middlename'=>'Петрович','birthday'=>'02.06.2001','password'=>bcrypt('123456'),'role_id'=>'1'],
            ['login'=>'2rss','email'=>'2rss@volcenter.ru','firstname'=>'Григорий','lastname'=>'Шестин','middlename'=>'Векторович','birthday'=>'12.03.1991','password'=>bcrypt('123456'),'role_id'=>'2'],
            ['login'=>'svcw','email'=>'svcw@volcenter.ru','firstname'=>'Александр','lastname'=>'Бледин','middlename'=>'Владиславович','birthday'=>'21.03.1980','password'=>bcrypt('123456'),'role_id'=>'3'],
        ];

        foreach ($users as $value) {
            DB::table('users')->insert([
                'login' => $value['login'],
                'email'=> $value['email'],
                'firstname'=> $value['firstname'],
                'lastname'=> $value['lastname'],
                'middlename'=> $value['middlename'],
                'birthday'=> date('Y-m-d', strtotime($value['birthday'])),
                'password'=> $value['password'],
                'role_id'=> $value['role_id']
            ]);
        }

        $addreses = [
            ['user_id'=>'1','country'=>'Россия','city'=>'Челябинск','street'=>'Ленина, 63','house'=>'5','ext'=>'','flat'=>'10'],
            ['user_id'=>'2','country'=>'Казахстан','city'=>'Астана','street'=>'Кузнецова, 13','house'=>'1','ext'=>'','flat'=>'4'],
            ['user_id'=>'3','country'=>'Россия','city'=>'Тюмень','street'=>'Шестеренко, 1','house'=>'34','ext'=>'а','flat'=>'5'],
            ['user_id'=>'4','country'=>'Россия','city'=>'Чебаркуль','street'=>'Перельван, 3','house'=>'4','ext'=>'','flat'=>'9'],
            ['user_id'=>'5','country'=>'Россия','city'=>'Копейск','street'=>'Гонечная, 14','house'=>'2','ext'=>'2','flat'=>'23']
        ];

        foreach ($addreses as $value) {
            DB::table('addreses')->insert([
                'user_id' => $value['user_id'],
                'country'=>$value['country'],
                'city'=>$value['city'],
                'street'=>$value['street'],
                'house'=>$value['house'],
                'ext'=>$value['ext'],
                'flat'=>$value['flat']
            ]);
        }

        $phones = [
            ['user_id'=>'1','phone'=>'89251454317'],
            ['user_id'=>'2','phone'=>'89015452351'],
            ['user_id'=>'3','phone'=>'89351432857'],
            ['user_id'=>'4','phone'=>'89151152357'],
            ['user_id'=>'5','phone'=>'89231447357'],
        ];

        foreach ($phones as $value) {
            DB::table('phones')->insert([
                'user_id' => $value['user_id'],
                'phone'=>$value['phone']
            ]);
        }

        $profile_types = [
            ['name'=>'Вконтакте'],
            ['name'=>'Skype'],
        ];

        foreach ($profile_types as $value) {
            DB::table('profile_types')->insert([
                'name' => $value['name'],
            ]);
        }

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

        $languages = [
            ['lang_name'=>'Французский'],
            ['lang_name'=>'Английский'],
            ['lang_name'=>'Немецкий'],
            ['lang_name'=>'Испанский'],
            ['lang_name'=>'Китайский'],
        ];

        foreach ($languages as $value) {
            DB::table('languages')->insert([
                'lang_name' => $value['lang_name']
            ]);
        }

        $level_languages = [
            ['name'=>'Начальный'],
            ['name'=>'Ниже среднего'],
            ['name'=>'Средний'],
            ['name'=>'Выше среднего'],
            ['name'=>'Продвинутый'],
        ];

        foreach ($level_languages as $value) {
            DB::table('level_languages')->insert([
                'name' => $value['name']
            ]);
        }

        $language_levels = [
            ['user_id'=>'1','language_id'=>'2','level_language_id'=>'2'],
            ['user_id'=>'2','language_id'=>'2','level_language_id'=>'1'],
            ['user_id'=>'3','language_id'=>'2','level_language_id'=>'3'],
            ['user_id'=>'4','language_id'=>'2','level_language_id'=>'4'],
            ['user_id'=>'5','language_id'=>'2','level_language_id'=>'5'],
        ];

        foreach ($language_levels as $value) {
            DB::table('language_levels')->insert([
                'user_id'=>$value['user_id'],
                'language_id'=>$value['language_id'],
                'level_language_id'=>$value['level_language_id']
            ]);
        }

        $studies = [
            ['user_id'=>'1','place_name'=>'ЮУрГУ','time_start'=>'2012','time_stop'=>'2016','group'=>'Э-105'],
            ['user_id'=>'2','place_name'=>'ЧГПУ','time_start'=>'2012','time_stop'=>'2016','group'=>'Л-225'],
            ['user_id'=>'3','place_name'=>'СОШ №2','time_start'=>'2012','time_stop'=>'2016','group'=>'8а'],
            ['user_id'=>'4','place_name'=>'СОШ №120','time_start'=>'2012','time_stop'=>'2016','group'=>'9в'],
            ['user_id'=>'5','place_name'=>'Колледж права и экономики','time_start'=>'2012','time_stop'=>'2016','group'=>'Э-203'],
        ];

        foreach ($studies as $value) {
            DB::table('studies')->insert([
                'user_id'=> $value['user_id'],
                'place_name'=> $value['place_name'],
                'time_start'=> date('Y-m-d', strtotime($value['time_start'])),
                'time_stop'=> date('Y-m-d', strtotime($value['time_stop'])),
                'group'=> $value['group'],
            ]);
        }
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

        $applications = [
            //подал и отменил
            ['user_id'=>'2','responsibility_event_id'=>'3','status_id'=>'1','datetime'=>'03.02.2016 18:00:03'],
            ['user_id'=>'2','responsibility_event_id'=>'3','status_id'=>'2','datetime'=>'03.02.2016 20:00:03'],
            //подал и отменил
            ['user_id'=>'1','responsibility_event_id'=>'1','status_id'=>'1','datetime'=>'03.02.2016 18:00:03'],
            ['user_id'=>'1','responsibility_event_id'=>'1','status_id'=>'2','datetime'=>'03.02.2016 19:00:03'],
            //подал
            ['user_id'=>'1','responsibility_event_id'=>'2','status_id'=>'1','datetime'=>'03.02.2016 19:01:03'],
            //подал
            ['user_id'=>'2','responsibility_event_id'=>'2','status_id'=>'1','datetime'=>'03.02.2016 20:00:05'],
            // подал и подтвердил админ
            ['user_id'=>'3','responsibility_event_id'=>'1','status_id'=>'1','datetime'=>'03.02.2016 20:02:08'],
            ['user_id'=>'3','responsibility_event_id'=>'1','status_id'=>'3','datetime'=>'03.02.2016 20:03:03'],
            // подал и подтвердил админ
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'1','datetime'=>'03.02.2016 21:00:03'],
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'3','datetime'=>'03.02.2016 21:01:17'],
            // подал и отклонил админ
            ['user_id'=>'3','responsibility_event_id'=>'5','status_id'=>'1','datetime'=>'03.02.2016 22:00:03'],
            ['user_id'=>'3','responsibility_event_id'=>'5','status_id'=>'4','datetime'=>'03.02.2016 22:01:03'],
            // подал и отклонил админ
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'1','datetime'=>'03.02.2016 22:11:03'],
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'4','datetime'=>'03.02.2016 22:13:03'],
            // подал, принял админ, принял участие
            ['user_id'=>'5','responsibility_event_id'=>'8','status_id'=>'1','datetime'=>'04.02.2016 14:01:03'],
            ['user_id'=>'5','responsibility_event_id'=>'8','status_id'=>'3','datetime'=>'04.02.2016 14:11:03'],
            ['user_id'=>'5','responsibility_event_id'=>'8','status_id'=>'5','datetime'=>'04.02.2016 14:13:03'],
            // подал, принял админ, принял участие
            ['user_id'=>'1','responsibility_event_id'=>'9','status_id'=>'1','datetime'=>'04.03.2016 14:01:03'],
            ['user_id'=>'1','responsibility_event_id'=>'9','status_id'=>'3','datetime'=>'04.03.2016 14:11:03'],
            ['user_id'=>'1','responsibility_event_id'=>'9','status_id'=>'5','datetime'=>'04.03.2016 14:13:03'],
            // подал, принял админ, принял участие
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'1','datetime'=>'04.03.2016 14:01:03'],
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'3','datetime'=>'04.03.2016 14:11:03'],
            ['user_id'=>'4','responsibility_event_id'=>'7','status_id'=>'5','datetime'=>'04.03.2016 14:13:03'],
            // подал, принял админ, не пришел
            ['user_id'=>'1','responsibility_event_id'=>'4','status_id'=>'1','datetime'=>'05.03.2016 14:01:03'],
            ['user_id'=>'1','responsibility_event_id'=>'4','status_id'=>'3','datetime'=>'05.03.2016 14:11:03'],
            ['user_id'=>'1','responsibility_event_id'=>'4','status_id'=>'6','datetime'=>'05.03.2016 14:13:03'],
            // подал, принял админ, не пришел
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'1','datetime'=>'06.03.2016 14:01:03'],
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'3','datetime'=>'06.03.2016 14:11:03'],
            ['user_id'=>'4','responsibility_event_id'=>'2','status_id'=>'6','datetime'=>'06.03.2016 14:13:03'],
        ];

        foreach ($applications as $value) {
            DB::table('applications')->insert([
                'user_id' => $value['user_id'],
                'responsibility_event_id'=> $value['responsibility_event_id'],
                'status_id'=> $value['status_id'],
                'datetime'=> date('Y-m-d h:i:s', strtotime($value['datetime'])),
            ]);
        }

    }
}
