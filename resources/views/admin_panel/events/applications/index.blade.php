@extends('admin_panel.layout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container"><h2>Заявки мероприятия: {{$event->name}}</h2></div>
        </div>
        <div class="panel-body">
            <div class="container refresh">

                        @include('admin_panel.events.applications.list', ['applications'=>$applications,'responsibilities'=>$responsibilities,'responsibilities_event'=>$responsibilities_event,'event'=>$event,'statuses'=>$statuses,'users'=>$users])

            </div>
        </div>
    </div>
    <script>
        function choose(identifier, status) {
            $status = status;
            $user_id = $(identifier).parents('tr#responsibility_event').children('td:nth-child(2)').children('a#user').data('userId')
            $responsibility_event = $(identifier).parents('tr#responsibility_event').data('responsibilityEventId');
            $data = {status_id:$status,user_id:$user_id,responsibility_event_id:$responsibility_event};
            $.ajax({
                type: "POST",
                url: '/adminpanel/events/{{$event->id}}/applications',
                data: $data,
                success: function(data) {
                    $('.refresh').html(data);
                }
            });
        }
    </script>
@endsection