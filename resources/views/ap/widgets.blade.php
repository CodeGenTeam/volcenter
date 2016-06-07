@extends('ap.layout')

@section('content')
    @foreach ($widgets as $widget)
        <div class="widget" id="{{ $widget->getName() }}-widget">
            {!! $widget->getView() !!}
        </div>
    @endforeach
@endsection
