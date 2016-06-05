@extends('admin/layout')
@section('content')
	Просто полная инфа о событии<br>
	{{$event->name}}<br>
	{{$event->descr}}
@endsection