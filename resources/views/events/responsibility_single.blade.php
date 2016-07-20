
@foreach($event->getResponsibilityEvent as $responsibility)
    <div class="panel panel-default panel-heading" style="margin-bottom: 0px" data-responsibility-id="{{$responsibility->id}}">
        <span class="badge" style="float: left;margin-right:10px">{{$responsibility->getResponsibility->count}}</span>
        @if(Auth::check())
            @if($applications!=null)
                @if($applications->responsibility_event_id==$responsibility->id)
                    @if($applications['status_id']!='2' && $applications['status_id']!='4' && $applications['status_id']!='5' && $applications['status_id']!='6')
                        <button class="btn btn-danger" style="float:right;" data-toggle="modal" onclick="choose(2,'{{$responsibility->id}}')">Отменить заявку</button>
                    @endif
                    @if($applications['status_id']=='4')
                        Ваша заявка была отклонена
                    @endif
                    @if($applications['status_id']=='3')
                        Ваша заявка была одобрена
                    @endif
                    @if($applications['status_id']=='5')
                        Вы приняли участие в мероприятии
                    @endif
                    @if($applications['status_id']=='6')
                        Вы не пришли на мероприятие
                    @endif
                @endif
                    @if($applications['status_id']=='2')
                        <button class="btn btn-primary" style="float:right;" data-toggle="modal" onclick="choose(1,'{{$responsibility->id}}')">Подать заявку</button>
                    @endif
                @if($applications['status_id']=='4')
                    <button class="btn btn-primary" style="float:right;" onclick="choose(1,'{{$responsibility->id}}')">Подать заявку</button>
                @endif
                @if($applications['status_id']=='3' && $applications->responsibility_event_id!=$responsibility->id)
                    <button class="btn btn-primary" style="float:right;" onclick="choose(1, '{{$responsibility->id}}')">Изменить заявку</button>
                @endif
            @else
                <button class="btn btn-primary" style="float:right;" onclick="choose(1,'{{$responsibility->id}}')">Подать заявку</button>
            @endif
        @endif
        <h3 class="panel-title">{{$responsibility->getResponsibility->position}}</h3>{{$responsibility->getResponsibility->task}}
    </div>
@endforeach

<script>
    function choose(status,responsibility_event) {
        $status = status;
        $user_id = '@if(Auth::check()){{Auth::user()->id}}@endif';
        $responsibility_event = responsibility_event;
        $data = {status_id:$status,user_id:$user_id,responsibility_event_id:$responsibility_event};
        $.ajax({
            type: "POST",
            url: '/event/{{$event->id}}/applications',
            data: $data,
            success: function(data) {
                $('.refresh').html(data);
            }
        });
    }
</script>