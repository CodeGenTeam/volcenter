<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Редактирование мероприятия</h4>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
            <form id="item-form" class="form-horizontal" role="form">
                <input type="hidden" name="id" value="{{ $event->id }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Название</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" value="{{ $event->name }}" name="name" placeholder="Название"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="descr">Описание</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="descr" name="descr" placeholder="Описание">{{ $event->descr }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Адрес</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="address" name="address" placeholder="Адрес">{{ $event->address }}</textarea>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button type="button" class="btn btn-primary" id="save_item">Сохранить</button>
        </div>
    </div>
</div>
