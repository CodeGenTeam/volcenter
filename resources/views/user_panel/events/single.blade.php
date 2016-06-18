@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center">Мероприятие {{ $event->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center"><i class="fa fa-clock-o"></i> С {{ $event->event_start }} По {{ $event->event_end }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center"><i class="fa fa-map-marker"></i> {{ $event->address }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Тип мероприятия: {{ $event->geteventtype->name }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">{{ $event->descr }}</p>
        </div>
    </div>
</div>

@endsection