<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th style="width: 100px;">Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach($responsibilities as $responsibility)
        <tr id="item" data-item-id="{{ $responsibility->id }}">
            <td>{{ $responsibility->id }}</td>
            <td>{{ $responsibility->position }}</td>
            <td>{{ $responsibility->task }}</td>
            <td>{{ $responsibility->count }}</td>
            <td>
                <span class="pull-right">
                    <a href="#" class="mdi-editor-mode-edit" id="edit"></a>
                    @if (Auth::user()->role() == 'admin')<a href="#" class="mdi-action-delete" id="delete"></a>@endif
                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
