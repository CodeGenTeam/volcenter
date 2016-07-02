@extends('layouts.main')
@section('content')
    <div class="container">
        @foreach ($events as $event)
            @include('user_panel.events.event_card')
        @endforeach
        <?php $e = App\Models\Event::where('event_stop', '<=', \Carbon\Carbon::now())->count();?>
        @if($e > 0)
            <hr><p class="text-center text-muted">И ещё {{ $e }} завершённых.</p>
        @endif
    </div>
@endsection