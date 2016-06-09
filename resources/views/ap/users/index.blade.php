@extends('ap/layout')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="container"><h2>Редактор пользователей</h2></div>
    </div>
    <div class="panel-body">
        <div class="container">
            <a href="#" class="btn btn-primary pull-right" id="add">
                <i class="mdi-av-my-library-add" style="font-size: 20px;"></i> Добавить пользователя
            </a>
            <div class="items-list">
                @include('ap.users.list', ['users' => $users])
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-hidden="true"></div>

<script>App.ajax_url = '/adminpanel/users';</script>
@endsection