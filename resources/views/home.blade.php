@extends('layouts.main')

@section('content')
<style>
    .card-event {
        width: 500px;
    }

    .row-centered {
        text-align:center;
    }

    .col-centered {
        display:inline-block;
        float:none;
        /* reset the text-align */
        text-align:left;
        /* inline-block space fix */
        margin-right:-4px;
    }
</style>
<div class="container">
    @if (!Auth::check())
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1 class="text-center">Центр волонтёров Южного Урала</h1>
                <h2 class="text-center">Мы рады приветствовать вас!</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <p class="lead text-center">Хотите стать Волонтером? Вам следует пройти простую регистрацию,
    чтобы всегда быть в курсе текущих мероприятий и активно принимать в них участие</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <p class="text-center"><a href="/register"><button type="button" class="btn btn-primary">Зарегестрироваться</button></a></p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <p class="lead text-center">Уже имеете учётную запись?</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-md-offset-5">
                <p class="text-center"><a href="/login"><button type="button" class="btn btn-primary">Войти</button></a></p>
            </div>
        </div>
        <br><br>
    @endif

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Ближайшие мероприятия:</p>
        </div>
    </div>
    @foreach ($events as $event)
            <div class="row row-centered">
                <div class="col-md-10 col-md-offset-3 col-centered">
                    <div class="panel panel-primary card-event">
                        <div class="panel-heading"><p class="lead" style="margin: 0px">@if($event->name){{ $event->name }}@elseНет названия@endif</p></div>
                        <div class="panel-body">
                            <td>@if ($event->image) <img class="img-rounded" src="/user_panel_bin/images/events/{{ $event->image }}" width="150px" style="float: left;margin-right: 10px">@elseНет изображения@endif</td>
                            <p class="text-muted">Тип мероприятия: {{ $event->geteventtype->name }}</p>
                            <p>Начало:
                                @if($event->event_start!="0000-00-00 00:00:00")
                                    <i class="fa fa-clock-o"></i> {{ $event->event_start }}
                                @else
                                    Уточняйте у организаторов
                                @endif </p>
                            <p>Конец:
                                @if($event->event_stop!="0000-00-00 00:00:00") <i class="fa fa-clock-o"></i> {{ $event->event_stop }}
                                @else Уточняйте у организаторов
                                @endif
                            </p>
                            <p><i class="fa fa-map-marker"></i>@if($event->address) {{ $event->address }} @else Адреса нет @endif</p>
                            <hr>
                            <p>@if($event->descr) {!! str_limit(nl2br(e($event->descr)),150) !!} @elseОписание отсутствует@endif</p>
                        </div>
                        <div class="panel-footer">
                            <a href="/event/{{ $event->id }}"><button type="button" class="btn btn-primary">Подробнее о мероприятии</button></a>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
</div>
@endsection