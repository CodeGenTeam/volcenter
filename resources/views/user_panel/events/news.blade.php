@extends('layouts.main')
@section('content')
    <div class="container">
        <h2 class="text-center">{{ $news->title }}</h2>
        <hr>
        {!! BBCode::parse($news->content) !!}
    </div>
@endsection