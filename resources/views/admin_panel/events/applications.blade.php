@extends('admin_panel.layout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container">
                <h2>Заявки мероприятия: {{ $event->name }}<br>
                    <small>{{ $event->descr }}</small>
                </h2>
            </div>
        </div>
        <div class="panel-body">
            <div class="container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Пользователь</th>
                            <th style="width: 150px;">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr id="item" data-item-id="{{ $application->id }}">
                                <td>{{ $application->id }}</td>
                                <?php $usr = $application->getUser()->first();?>
                                <td>{{ $usr->firstname . ' ' . $usr->lastname . ' (' . $usr->email . ')' }}</td>
                                <td>
                                    <span class="pull-right">
                                        <a class="link-black" href="#"
                                           onclick="applicationApprove({{ $application->id }})">Подтвердить</a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function applicationApprove(id) {
            $.get('/adminpanel/applications/approve',
                    {application: id},
                    function () {
                        $('div.container tr[data-item-id="' + id + '"]').hide('slow');
                    }
            );
        }
    </script>
@endsection