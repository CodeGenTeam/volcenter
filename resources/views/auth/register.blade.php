@extends('layouts.main')

<?php
$fields = [
        [
                'id' => 'login',
                'descr' => 'Логин',
        ],
        [
                'id' => 'email',
                'descr' => 'Почта',
                'type' => 'email',
        ],
        [
                'id' => 'firstname',
                'descr' => 'Имя',
        ],
        [
                'id' => 'lastname',
                'descr' => 'Фамилия',
        ],
        [
                'id' => 'middlename',
                'descr' => 'Отчество',
        ],
        [
                'replace' => 'birthday.field',
        ],
        [
                'id' => 'password',
                'descr' => 'Пароль',
                'type' => 'password',
        ],
        [
                'id' => 'password_confirmation',
                'descr' => 'Повторите пароль',
                'type' => 'password',
        ],
];
?>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Регистрация</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            @section('birthday.field')
                                {{-- TODO запилить выбор даты рождения --}}
                            @endsection

                            @foreach ($fields as $field)
                                @if (!isset($field['replace']))
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">{{ $field['descr'] }}</label>
                                        <div class="col-md-6">
                                            <input type="{{ $field['type'] ?? 'text' }}" class="form-control"
                                                   name="{{ $field['id'] }}"
                                                   value="{{ old('name') }}">

                                            @if ($errors->has($field['id']))
                                                <span class="help-block">
                                                <b>{{ $errors->first($field['id']) }}</b>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    @yield($field['replace'])
                                @endif
                            @endforeach

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
