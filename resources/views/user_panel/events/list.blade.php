@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @foreach ($events as $event)
                    @include('user_panel.events.event_card')
                @endforeach
            </div>
            <div class="col-md-3">
                @include('common.calendar')
            </div>
        </div>
        <?php $e = App\Models\Event::where('event_stop', '<=', \Carbon\Carbon::now())->count();?>
        @if($e > 0)
            <hr><p class="text-center text-muted">И ещё {{ $e }} завершённых.</p>
        @endif
    </div>
@endsection