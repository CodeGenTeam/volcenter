@extends('layouts.main')
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
@section('content')

	<div class="container">
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
    @include('common.top')
</div>

@endsection