@extends('layouts.main')

@section('content')
    <div class="alert alert-danger container" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Вы не авторизованы! <a href="/login">Авторизуйтесь сначала</a>, <a href="\">вернуться на главную.</a>
    </div>
@endsection