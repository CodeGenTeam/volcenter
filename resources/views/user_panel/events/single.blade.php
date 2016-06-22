@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1 class="text-center">Мероприятие<br />@if($event->name) {{ $event->name }}@elseНазвание отсутствует@endif</h1>
            @if ($event->image)<img class="img-rounded img-responsive center-block" src="/user_panel_bin/images/events/{{ $event->image }}" width="250px">@else<p class="lead text-center">Нет изображения</p>@endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Тип мероприятия: @if($event->geteventtype->name){{ $event->geteventtype->name }}@elseТип отсутствует@endif</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Пройдет<br />C @if($event->event_start){{ $event->event_start }}@elseОтсутствует@endif<br/> По @if($event->event_stop){{ $event->event_stop }}@elseОтсутствует@endif</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center"><i class="fa fa-map-marker"></i> @if($event->address){{ $event->address }}@elseОтсутствует@endif</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="text-center">@if($event->descr){!! nl2br(e($event->descr)) !!}@elseОтсутствует@endif</p>
        </div>
    </div>
    @if($event->getResponsibility != "[]")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="border: 0px;">
                <div class="panel-heading" >
                    <h3 class="panel-title">Направления работ <span class="glyphicon glyphicon-user"></span></h3>
                </div>
                <ul class="list-group">
                <span style="display: none;">{{ $i=0 }}</span>
                    @foreach($event->getResponsibility as $responsibility)

                        <div class="panel panel-default panel-heading" style="margin-bottom: 0px"><span class="badge" style="float: left;margin-right:10px">{{$responsibility->count}}</span>
                            @if(Auth::check())
                                <!--<button class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#myModal">Подать заявку</button>-->
                                @if($i++==0)
                                <button class="btn btn-danger" style="float:right;" data-toggle="modal" data-target="#deModal">Отменить заявку</button>
                                @endif
                            @endif
                            <h3 class="panel-title">{{$responsibility->position}}</h3>{{$responsibility->task}}</div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
    @if($event->getMotivation != "[]")
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="border: 0px;">
                <div class="panel-heading" >
                    <h3 class="panel-title">Стимулы и мотивация <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></h3>
                </div>
                <ul class="list-group">
                    @foreach($event->getMotivation as $motivation)
                        <div class="panel panel-default panel-heading" style="margin-bottom: 0px">{{$motivation->name}}</div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endif
    <br />
    @if (!Auth::check())
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Хотите участвовать?<br /> Вам следует зарегистрироваться, чтобы принять участие</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <p class="text-center"><a href="/register"><button type="button" class="btn btn-primary">Зарегистрироваться</button></a></p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p class="lead text-center">Уже имеете учётную запись?</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <p class="text-center"><a href="/login"><button type="button" class="btn btn-primary">Войти</button></a></p>
        </div>
    </div>
    @endif
</div>
<script>
    function notie() {
        alert('Заявка подана!');
    }

    $('#myModal').on('shown.bs.modal', function () {
    });
</script>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Подтверждение заявки</h4>
      </div>
      <div class="modal-body">
        <p>Подтвердите вашу заявку</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#myModal2">Подтвердить</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Подтверждение заявки</h4>
      </div>
      <div class="modal-body">
        <p>Заявка подтверждена!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="deModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Отмена заявки</h4>
      </div>
      <div class="modal-body">
        <p>Вы действительно хотите отменить заявку?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#deModal2">Подтвердить</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="deModal2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Отмена заявки</h4>
      </div>
      <div class="modal-body">
        <p>Вы отменили заявку!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection