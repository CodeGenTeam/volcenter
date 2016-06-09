<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th style="width: 100px;">Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach($events_type as $type)
        <tr id="item" data-item-id="{{ $type->id }}">
            <td>{{ $type->id }}</td>
            <td>{{ $type->name }}</td>
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
