<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">
                @if ($responsibility->id)
                    Редактирование направления работ
                @else
                    Создание мотивации
                @endif
            </h4>
        </div>
        <!-- Modal Body -->
        <form id="item-form" class="form-horizontal" role="form" action="#" data-toggle="popel-validator">
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $responsibility->id }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Название позиции</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="position" value="{{ $responsibility->position }}" data-rules="not-empty" name="position" placeholder="Название"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Задачи</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="task" value="{{ $responsibility->task }}" data-rules="not-empty" name="task" placeholder="Название"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Количество</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="count" value="{{ $responsibility->count }}" data-rules="not-empty" name="count" placeholder="Название"/>
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
