<div class="items-list">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Пользователь</th>
            <th>Статус</th>
            <th>Время действия</th>
            <th>Направление</th>
            <th style="width: 100px;">Действие</th>
        </tr>
        </thead>
        <div >
<tbody>
@foreach($applications as $application)
    @foreach($responsibilities_event as $responsibility_event)
        @if($application->last()['responsibility_event_id'] == $responsibility_event['id'])
            <tr id="responsibility_event" data-responsibility-event-id="{{$responsibility_event['id']}}">
                <td>{{$application->last()['id']}}</td>
                <td>
                    @foreach($users as $user)
                        @if($application->last()['user_id'] == $user->id)
                            <a href="/user/profile/{{$user->id}}" id="user" data-user-id="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</a>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($statuses as $status)
                        @if($application->last()['status_id'] == $status->id)
                            {{$status->name}}
                        @endif
                    @endforeach
                </td>
                <td>{{$application->last()['datetime']}}</td>
                @foreach($responsibilities as $responsibility)
                    @if($responsibility_event->responsibility_id == $responsibility->id)
                        <td>{{$responsibility->position}}</td>
                    @endif
                @endforeach
                <td id="application">
                    @if($application->last()['status_id']==1)
                        <a href="#" class="status" onclick="choose(this,3)">Принять</a><br />
                        <a href="#" class="status" onclick="choose(this,4)">Отклонить</a>
                    @endif
                    @if($application->last()['status_id']==2)
                        Действий доступных нет
                    @endif
                    @if($application->last()['status_id']==3)
                        <a href="#" class="status" onclick="choose(this,4)">Отклонить участие</a><br />
                        <a href="#" class="status" onclick="choose(this,5)">Принял участие</a><br />
                        <a href="#" class="status" onclick="choose(this,6)">Не пришел</a>
                    @endif
                    @if($application->last()['status_id']==4)
                        <a href="#" class="status" onclick="choose(this,3)">Принимает участие</a>
                    @endif
                    @if($application->last()['status_id']==5)
                        <a href="#" class="status" onclick="choose(this,4)">Отклонить участие</a><br />
                        <a href="#" class="status" onclick="choose(this,3)">Перевести в принимает участие</a>
                    @endif
                    @if($application->last()['status_id']==6)
                        <a href="#" class="status" onclick="choose(this,5)">Перевести в принял участие</a><br />
                        <a href="#" class="status" onclick="choose(this,3)">Принимает участие</a><br />
                        <a href="#" class="status" onclick="choose(this,4)">Не принимает участие</a>
                    @endif
                </td>
            </tr>
        @endif
    @endforeach
@endforeach
</tbody>
</div>
</table>
</div>