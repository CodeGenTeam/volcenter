ID мероприятия: {{$event->id}}<br />
Начало мероприиятия: {{$event->event_start}}<br />
Окончание мероприятия: {{$event->event_end}}<br />
Название: {{$event->name}}<br />
Картинка: {{$event->image}}<br />
Описание мероприятия: {{$event->descr}}<br />
Адрес мероприятия: {{$event->address}}<br />
Начало регистрации: {{$event->event_start_register_user}}<br />
Окончание регистрации: {{$event->event_stop_register_user}}<br />
Тип направления: {{$event->geteventtype->name}}<br/>
<br/>
Направления:
<br/><br/>
@foreach($event->getResponsibility as $responsibility)
    Позиция: {{$responsibility->position}}<br/>
    Задача: {{$responsibility->task}}<br/>
    Количество: {{$responsibility->count}}<br/>
    <br/>
@endforeach
<br/>
Мотивации:
<br/><br/>
@foreach($event->getMotivation as $motivation)
    Название: {{$motivation->name}}<br/>
    Описание: {{$motivation->descr}}<br/>
    <br/>
@endforeach