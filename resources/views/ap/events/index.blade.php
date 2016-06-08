@extends('ap/layout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="container"><h2>Редактор мероприятий</h2></div>
    </div>
    <div class="panel-body">
        <div class="container">
            <a href="#" class="btn btn-primary pull-right" id="add">
                <i class="mdi-av-my-library-add" style="font-size: 20px;"></i> Добавить мероприятие
            </a>
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
                        <tr id="item" data-item-id="{{ $event->id }}">
                            <td class="event_id">{{ $event->id }}</td>
                            <td class="event_name">{{ $event->name }}</td>
                            <td class="event_descr">{{ $event->descr }}</td>
                            <td class="event_address">{{ $event->address }}</td>
                            <td>
                                <span class="pull-right">
                                    <a href="#" class="mdi-editor-mode-edit" id="edit"></a>
                                    <a href="#" class="mdi-action-delete" id="delete"></a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

<script>App.ajax_url = '/adminpanel/events';</script>
@endsection