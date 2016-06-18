@extends('admin_panel.layout')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="container"><h2>Просмотр групп</h2></div>
        </div>
        <div class="panel-body">
            <div class="container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Имя группы</th>
                            <th>Описание</th>
                            <th>Пользователи</th>
                            <th>Правила</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($groups as $group)
                            <tr id="item" data-item-id="{{ $group->id }}">
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->descr }}</td>
                                <td>
                                    @if ($group->name == 'guest')
                                        —
                                    @else
                                        <a href="/adminpanel/pex/group/users?group={{ $group->id }}"
                                           class="link-black">{{ 'пользователей: ' . $group->users()->count() }}</a>
                                    @endif
                                </td>
                                <td><a href="/adminpanel/pex/group?group={{ $group->id }}"
                                       class="link-black">{{ 'правил: ' . $group->rules()->count() }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
