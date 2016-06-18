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
                <div class="panel-heading"><p class="lead">{{ $event->name }}</p></div>
                  <div class="panel-body">
                    <p class="text-muted">{{ $event->geteventtype->name }}</p>
                    <p><i class="fa fa-clock-o"></i> С: {{ $event->event_start }} По: {{ $event->event_end }}</p>
                    <p><i class="fa fa-map-marker"></i> {{ $event->address }}</p>
                    <hr>
                    <p>{{ $event->descr }}</p>
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