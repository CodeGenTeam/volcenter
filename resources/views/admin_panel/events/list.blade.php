<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Название</th>
        <th>Тип мероприятия</th>
        <th>Картинка</th>
        <th>Описание</th>
        <th>Адрес</th>
        <th style="width: 100px;">Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach($events as $event)
        <tr id="item" data-item-id="{{ $event->id }}">
            <td>{{ $event->name }}</td>
            <td>{{ $event->getEventType->name }}</td>
            <td>@if ($event->image)<img src="/bin/img/events/{{ $event->image }}" width="150px">@endif</td>
            <td>{!! str_limit(nl2br(e($event->descr)),150) !!}</td>
            <td>{{ $event->address }}</td>
            <td>
                <span class="pull-right">
                    <a href="#" class="mdi-editor-mode-edit" id="edit"></a>
                    @if (Auth::user()->role() == 'admin')<a href="#" class="mdi-action-delete" id="delete"></a>@endif
                    <a href="/adminpanel/events/{{$event->id}}/motivations" class="mdi-action-favorite"></a>
                    <a href="/adminpanel/events/{{$event->id}}/responsibilities" class="mdi-social-person"></a>
                    @if (Auth::user()->role() == 'admin')<a href="/adminpanel/events/{{$event->id}}/applications" class="mdi-action-assignment"></a>@endif
                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>