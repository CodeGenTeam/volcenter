{{$event->id}}<br />
{{$event->event_start}}<br />
{{$event->event_end}}<br />
{{$event->name}}<br />
{{$event->ima}}<br />
{{$event->descr}}<br />
{{$event->address}}<br />
{{$event->event_type}}<br />
{{$event->event_start_register_user}}<br />
{{$event->event_stop_register_user}}<br />
{{$event->geteventtype->name}}

@foreach($event->getMotivation as $motivation)
    {{$motivation}}
@endforeach