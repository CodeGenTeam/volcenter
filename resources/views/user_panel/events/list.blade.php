@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            @if (!$date->isToday())
                <div class="col-xs-12">
                    <p class="text-center text-info lead">Статистика мероприятий на {{ $date->toDateString() }}<br>
                        <small><a href="{!! url('/events') !!}">На сегодня</a></small>
                    </p>
                </div>
            @endif
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                @foreach ($events as $event)
                    @include('user_panel.events.event_card')
                @endforeach
            </div>
            <div class="visible-lg col-lg-3">
                @include('common.calendar')
            </div>
        </div>
        <?php $e = App\Models\Event::where('event_stop', '<=', $date)->count();?>
        @if($e > 0)
            <hr><p class="text-center text-muted">И ещё {{ $e }} завершённых.</p>
        @endif
    </div>
@endsection