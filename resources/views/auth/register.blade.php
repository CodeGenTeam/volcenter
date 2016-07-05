@extends('layouts.main')

<?php
$fields = [
        [
                'id' => 'username',
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
                'id' => 'birthday',
                'descr' => 'Дата рождения',
                'type' => 'date',
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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('register') }}">
                            {!! csrf_field() !!}

                            @foreach ($fields as $field)
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">{{ $field['descr'] }}</label>
                                    <div class="col-md-6">
                                        @if ($field['id'] !== 'birthday')
                                                <input type="{{ $field['type'] ?? 'text' }}" class="form-control"
                                                       name="{{ $field['id'] }}"
                                                       value="{{old($field['id'])}}">
                                            @if ($errors->has($field['id']))
                                                <span class="help-block"><b>{{ $errors->first($field['id']) }}</b></span>
                                            @endif
                                        @else
                                            <div class='input-group date' id='{{ $field['id'] }}'>
                                                <input type='text' class="form-control" name="{{ $field['id'] }}" value="{{ old($field['id']) }}" id="{{ $field['id'] }}">
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            @if ($errors->has($field['id']))
                                                <span class="help-block"><b>{{ $errors->first($field['id']) }}</b></span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Зарегистрироваться
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#birthday').datetimepicker({
                format: 'YYYY-MM-DD',
            });
    </script>
@endsection