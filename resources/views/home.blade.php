@extends('layouts.main')

@section('content')
    <div class="container">
        @if (!Auth::check())
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h1 class="text-center">Центр волонтёров Южного Урала</h1>
                    <h2 class="text-center">Мы рады приветствовать вас!</h2>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p class="lead text-center">Хотите стать Волонтером? Вам следует пройти простую регистрацию,
                        чтобы всегда быть в курсе текущих мероприятий и активно принимать в них участие</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <p class="text-center"><a href="/register">
                            <button type="button" class="btn btn-primary">Зарегистрироваться</button>
                        </a></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p class="lead text-center">Уже имеете учётную запись?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-md-offset-5">
                    <p class="text-center"><a href="/login">
                            <button type="button" class="btn btn-primary">Войти</button>
                        </a></p>
                </div>
            </div>
            <br><br>
        @endif
        <p class="lead text-center">Ближайшие мероприятия:</p>
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-6 col-md-offset-3">
                    @include('user_panel.events.event_card')
                </div>
            @endforeach
        </div>
    </div>
@endsection