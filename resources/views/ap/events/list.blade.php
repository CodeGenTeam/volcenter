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
            <td>{{ $event->id }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->descr }}</td>
            <td>{{ $event->address }}</td>
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
