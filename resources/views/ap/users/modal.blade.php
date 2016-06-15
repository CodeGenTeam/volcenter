<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">
                @if ($user->id)
                    Редактирование пользователя
                @else
                    Создание пользователя
                @endif
            </h4>
        </div>
        <!-- Modal Body -->
        <form id="item-form" class="form-horizontal" role="form" action="#" data-toggle="popel-validator">
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="login">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $user->login }}" data-rules="not-empty" name="login" placeholder="Логин"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="email" name="email" data-rules="not-empty email" value="{{ $user->email }}" placeholder="Email" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="firstname">Имя</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="firstname" name="firstname" data-rules="not-empty" value="{{ $user->firstname }}" placeholder="Имя" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="lastname">Фамилия</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="lastname" name="lastname" data-rules="not-empty" value="{{ $user->lastname }}" placeholder="Фамилия" />
                    </div>
                </div>
{{--<div class="form-group">
    <label class="col-sm-2 control-label" for="place_of_work">Место работы</label>
    <div class="col-sm-10">
        <input class="form-control" id="place_of_work" name="place_of_work" data-rules="not-empty" value="{{ $user->place_works }}" placeholder="Место работы" />
    </div>
</div>--}}
<div class="form-group">
    <label class="col-sm-2 control-label" for="name">День рождения</label>
    <div class="col-sm-10">
        <div class='input-group date' id='birthday'>
            <input type='text' class="form-control" data-rules="not-empty" name="birthday" value="{{ $user->birthday }}" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
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
<script type="text/javascript">
$(function () {
$('#birthday').datetimepicker({
format: 'YYYY-MM-DD HH:mm:ss'
});
});
</script>
