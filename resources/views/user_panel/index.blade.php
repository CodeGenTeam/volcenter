<div id="main-page-wrapper" >
	<h1>Центр волонтеров Южного Урала</h1>
	<h3>Мы рады приветствовать вас</h3>

	<div ng-if="role == 'anonymous'">
		<h4>Хотите стать Волонтером? Вам следует пройти простую регистрацию,<br>
		чтобы всегда быть в курсе текущих мероприятий и активно принимать в них участие</h4>
		<div class="button button-color-2 href"><a  ui-sref="reg">Зарегистрироватсья</a></div>

		<h4 class="h4-mar-lit">Уже имеете учетную запись?</h4>
		<div class="button button-color-2 href"><a  ui-sref="login">Войти</a></div>
	</div>

	<div id="events-wrapepr">
		<h3>Ближайшие мероприятия</h3>
		<div class="main-page-event admin-page-event">
		@foreach ($events as $ev)
			<a class="page-event-a" href="#/event/{{$ev->id}}" >
				<div class="event-name">{{$ev->name}}</div>
				<img ng-src="{{ $ev->image }}">
				<div class="event-dateStart event-dark">
					<i class="glyphicon glyphicon-time"></i>
					{{$ev->event_start}} - {{$ev->event_end}}
				</div>

				<div class="event-type event-dark">{{$ev->get_event_type->name}}</div>
				<div class="event-place">Место: {{$ev->address}}</div>

				<div class="event-descr">{{$ev->descr}}</div>
				<div class="event-dateStart event-dark">
					<i class="glyphicon glyphicon-time"></i>
					{{$ev->event_start_register_user}} - {{$ev->event_stop_register_user}}
				</div>
			</a>
		@endforeach
		</div>
	</div>
</div>
