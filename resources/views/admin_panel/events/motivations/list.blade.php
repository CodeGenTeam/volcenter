<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th>Название</th>
        <th style="width: 100px;">Действие</th>
    </tr>
    </thead>
    <tbody>
    @foreach($event->getMotivationEvent as $motivation)
        <tr id="item" data-item-id="{{ $motivation->id }}">
            <td>{{$motivation->getMotivation['name']}}</td>
            <td>
                <span class="pull-right">
                    <a href="#" class="mdi-action-delete" id="delete"></a>
                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>