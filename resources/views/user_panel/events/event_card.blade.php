<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            @if($event->name)
                <div class="panel-heading"><h2>{{ $event->name }}
                        @if($event->event_start != "0000-00-00 00:00:00")
                            <span class="badge pull-right">
                                            @if ($event->event_stop <= \Carbon\Carbon::now())
                                    Завернён
                                @elseif ($event->event_start < \Carbon\Carbon::now())
                                    Ещё не начат
                                @else
                                    Начат
                                @endif
                                        </span>
                        @endif
                    </h2></div>
            @endif
            <div class="panel-body">
                @if ($event->image)
                    <img class="img-rounded" src="/user_panel_bin/images/events/{{ $event->image }}"
                         width="150px" style="float: left;margin-right: 10px">
                @endif
                <p class="text-muted">Тип мероприятия: {{ $event->geteventtype->name }}</p>
                <p>Начало:
                    @if($event->event_start!="0000-00-00 00:00:00")
                        <i class="fa fa-clock-o"></i> {{ $event->event_start }}
                    @else
                        Уточняйте у организаторов
                    @endif
                </p>
                <p>Конец:
                    @if($event->event_stop!="0000-00-00 00:00:00") <i
                            class="fa fa-clock-o"></i> {{ $event->event_stop }}
                    @else Уточняйте у организаторов
                    @endif
                </p>
                @if($event->address)
                    <p><i class="fa fa-map-marker"></i> {{ $event->address }}</p>
                @endif
                <hr>
                @if($event->descr)
                    <p>{!! str_limit(nl2br(e($event->descr)),150) !!}</p>
                @endif
            </div>
            <div class="panel-footer">
                <a href="/event/{{ $event->id }}">
                    <button type="button" class="btn btn-primary">Подробнее о мероприятии</button>
                </a>
            </div>
        </div>
    </div>
</div>