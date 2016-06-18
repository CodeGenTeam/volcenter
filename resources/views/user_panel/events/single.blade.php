@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center">Мероприятие<br />@if($event->name) {{ $event->name }}@elseНазвание отсутствует@endif</h1>
            @if ($event->image)<img class="img-rounded img-responsive center-block" src="/user_panel_bin/images/events/{{ $event->image }}" width="250px">@else<p class="lead text-center">Нет изображения</p>@endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Тип мероприятия: @if($event->geteventtype->name){{ $event->geteventtype->name }}@elseТип отсутствует@endif</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Пройдет<br />C @if($event->event_start){{ $event->event_start }}@elseОтсутствует@endif<br/> По @if($event->event_end){{ $event->event_end }}@elseОтсутствует@endif</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center"><i class="fa fa-map-marker"></i> @if($event->address){{ $event->address }}@elseОтсутствует@endif</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">@if($event->descr){!! nl2br(e($event->descr)) !!}@elseОтсутствует@endif</p>
        </div>
    </div><br />
    @if (!Auth::check())
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Хотите участвовать?<br /> Вам следует зарегистрироваться, чтобы принять участие</p>
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
    @endif
</div>

@endsection