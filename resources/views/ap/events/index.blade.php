@extends('ap/layout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="container"><h2>Редактор мероприятий</h2></div>
    </div>
    <div class="panel-body">
        <div class="container">
            <a href="#" class="btn btn-primary pull-right">
                <i class="mdi-av-my-library-add" id="add" data-module="events" style="font-size: 20px;"></i> Добавить мероприятие</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Адрес</th>
                        <th style="width: 100px;">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr id="e{{ $event->id }}">
                            <th>{{ $event->id }}</th>
                            <th>{{ $event->name }}</th>
                            <th>{{ $event->descr }}</th>
                            <th>{{ $event->addres }}</th>
                            <th>
                                <span class="pull-right">
                                    <i class="mdi-editor-mode-edit" id="edit"></i>
                                    <i class="mdi-action-delete" id="delete"></i>
                                </span>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection