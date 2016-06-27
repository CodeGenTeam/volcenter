<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Название</th>
        <th style="width: 100px;">Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach($event->getResponsibilityEvent as $responsibility)
        <tr id="item" data-item-id="{{ $responsibility->id }}">
            <td>{{$responsibility->getResponsibility['position']}}</td>
            <td>
                <span class="pull-right">
                    <a href="#" class="mdi-action-delete" id="delete"></a>
                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>