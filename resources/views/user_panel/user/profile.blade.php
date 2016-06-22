@extends('layouts.main')

@section('content')
<style>
	img {
		width: 200px;
	}
</style>
<div class="container">
    <div class="col-md-10 col-md-offset-1">
        @if ($user->image)
		<div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                	<img src="/user_panel_bin/images/users/{{ $user->image }}" alt="">
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h1>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>Email: {{ $user->email }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>Дата рождения: {{ date('d.m.Y', strtotime($user->birthday)) }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h2>Профили:</h2>
                    <p>Skype: mrkeezy67</p>
                    <p>Вконтакте: <a href="https://vk.com/flaffen" target="_blank">vk.com/flaffen</a></p>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>Учебное заведение: ЮУрГУ</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>Начало обучения: 2010</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>Конец обучения: 2016</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                	<h2>Языки:</h2>
                	<p>Английский: intermediate</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection