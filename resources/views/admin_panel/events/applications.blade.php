@extends('admin_panel.layout')
@section('content')
    <div class="container">
        {{dd($application)}}
        <h2>Мероприятие: {{$event->name}}</h2>
        <table class="table table-striped table-hover">
            <a href="#" class="btn btn-primary pull-right" id="add">
                <i class="mdi-av-my-library-add" style="font-size: 20px;"></i> Добавить направление
            </a>
            <thead>
            <tr>
                <th>Направление</th>
                <th>Задача</th>
                <th>Количество</th>
                <th style="width: 100px;">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($event->getRespon as $responsibility)
                <tr>
                    <td>{{$responsibility->getResponsibility->position}}</td>
                    <td>{{$responsibility->getResponsibility->task}}</td>
                    <td>{{$responsibility->getResponsibility->count}}</td>
                    <td>
                <span class="pull-right">
                    <a href="#" class="mdi-action-delete" id="delete"></a>
                </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection