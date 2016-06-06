@foreach($users as $user)
    <div class="user">
        <p>
            Логин: {{ $user->login }} <br>
            Почта: {{ $user->email }}
        </p>
    </div>
@endforeach