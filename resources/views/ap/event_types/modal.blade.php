<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">
                @if ($event_type->id)
                    Редактирование типа мероприятия
                @else
                    Создание типа мероприятия
                @endif
            </h4>
        </div>
        <!-- Modal Body -->
        <form id="item-form" class="form-horizontal" role="form" action="#" data-toggle="popel-validator">
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $event_type->id }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Название</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" value="{{ $event_type->name }}" data-rules="not-empty" name="name" placeholder="Название"/>
                    </div>
                </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary" id="save_item">Сохранить</button>
            </div>
        </form>
    </div>
</div>
