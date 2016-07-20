@extends('admin_panel.layouts.main')
@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="container"><h2>Направления мероприятия: {{$event->name}}</h2></div>
            </div>
            <div class="panel-body">
                <div class="container">
                        <a href="#" class="btn btn-primary pull-right" id="add">
                            <i class="mdi-av-my-library-add" style="font-size: 20px;"></i> Добавить направление
                        </a>
                    <div class="items-list">
                        @include('admin_panel.events.responsibilities.list', ['event' => $event])
                    </div>
                </div>
            </div>
        </div>

    <div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-hidden="true"></div>
    <script>App.ajax_url = '/adminpanel/events/'+"{{$event->id}}"+'/responsibilities';</script>
@endsection