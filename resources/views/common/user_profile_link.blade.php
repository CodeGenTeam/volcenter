@if($nolink ?? false)
    {{ $user->firstname }} {{ $user->lastname }}
@else
    <a href="{{ url('/user/profile/' . $user->id)}}">{{ $user->firstname }} {{ $user->lastname }}</a>
@endif