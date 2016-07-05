@extends('layouts.main')

@section('content')
<style>
	img {
		width: 200px;
	}
</style>

<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <h2>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</h2>
                </div>
            </div>
        </div>
        @if ($user->image)
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <img src="/user_panel_bin/images/users/{{ $user->image }}" alt="">
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        Фотография отсутствует
                    </div>
                </div>
            </div>

        @endif
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
                    <p>Дата рождения: {{ $user->birthday->format('m-d-Y') }}</p>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        @if($user->profiles!='[]')<h3>Профили</h3>@endif
                        @foreach($user->profiles as $profile)
                            <h5>{{$profile->getProfileType->name}}:</h5>
                            @if($profile->getProfileType->name=='Вконтакте')
                                <a href="{{$profile->link}}">{{$profile->link}}</a><br />
                            @endif
                                @if($profile->getProfileType->name=='Skype')
                                    {{$profile->link}}
                                @endif
                        @endforeach
                    </div>
                </div>
            </div>

        <br>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    @if($user->study!='[]')
                    <h3>Учеба</h3>@endif
                    @foreach($user->study as $study)
                        Название: {{$study->place_name}}<br />
                        @if($study->time_start!='0000-00-00 00:00:00')Начало обучения:{{$study->time_start}}<br />@endif
                        @if($study->time_stop!='0000-00-00 00:00:00')Окончание обучения:{{$study->time_stop}}<br />@endif
                        @if($study->time_group!='')@if($study->getStudyUniversity)Группа:@else Класс: @endif {{$study->time_group}}<br />@endif
                        @if($study->getStudyUniversity)
                            Направление(факультет): {{$study->getStudyUniversity->faculty}}<br />
                            Специальность(кафедра): {{$study->getStudyUniversity->chair}}<br />
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    @if($user->study!='[]')
                        <h3>Языки</h3>@endif
                    @foreach($user->language as $language)
                        Язык: {{$language->getLanguage->lang_name}}<br />
                        Уровень: {{$language->getLevel->name}}
                    @endforeach
                </div>
            </div>
        </div>

        @if(Auth::user())
            <form action="/user/profile/{{ $user->id }}/message/{{ Auth::user()->id }}" method="POST">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <label for="title">Тема сообщения: </label>
                            <input type="text" name="title" placeholder="Тема сообщения" id="title">

                            <label for="content">Текст сообщения: </label>
                            <textarea name="message_content" id="content"></textarea>

                            <button class="btn btn-primary" type="submit">Написать личное сообщение</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection