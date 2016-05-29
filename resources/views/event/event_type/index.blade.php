@extends('layouts.main')

@section('content')
    {{--
    <div class="alert alert-danger" v-if="!isValid">
			<ul>
				<li v-show="!validation.name">Name field is required.</li>
				<li v-show="!validation.email">Input a valid email address.</li>
				<li v-show="!validation.address">Address field is required.</li>
			</ul>
	</div>

	<form action="#" @submit.prevent="AddNewUser" method="POST">

			<div class="form-group">
				<label for="name">Name:</label>
				<input v-model="newUser.name" type="text" id="name" name="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input v-model="newUser.email" type="text" id="email" name="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="address">Address:</label>
				<input v-model="newUser.address" type="text" id="address" name="address" class="form-control">
			</div>

			<div class="form-group">
				<button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Add New User</button>

				<button :disabled="!isValid" class="btn btn-default" type="submit" v-if="edit" @click="EditUser(newUser.id)">Edit User</button>
			</div>

		</form>

		<div class="alert alert-success" transition="success" v-if="success">Add new user successful.</div>

		<table class="table">
			<thead>
				<th>ID</th>
				<th>NAME</th>
				<th>EMAIL</th>
				<th>ADDRESS</th>
				<th>CREATED_AT</th>
				<th>UPDATED_AT</th>
				<th>CONTROLLER</th>
			</thead>

			<tbody>
				<tr v-for="user in users">
					<td>@{{ user.id }}</td>
					<td>@{{ user.name }}</td>
					<td>@{{ user.email }}</td>
					<td>@{{ user.address }}</td>
					<td>@{{ user.created_at }}</td>
					<td>@{{ user.updated_at }}</td>
					<td>
						<button class="btn btn-default btn-sm" @click="ShowUser(user.id)">Edit</button>
						<button class="btn btn-danger btn-sm" @click="RemoveUser(user.id)">Remove</button>
					</td>
				</tr>
			</tbody>
		</table>
     --}}
    <div id="el_event_type" class="container">
        <div class = "panel panel-default">
            <div class = "panel-heading">Типы мероприятий
                <span class="glyphicon glyphicon-plus" aria-hidden="true" rel="tooltip" title="Добавить новый тип" data-toggle="modal" data-target="#m_add"></span>
            </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Название типа мероприятия</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
                <collection v-for="event_type_elem in event_type" :current_text="event_type_elem.name" :current_id="$index+1"></collection>
            </tbody>
        </table>
        </div>
        <module-window m_title="Добавление типа мероприятия" m_body="Введите строковое значение для типа мероприятия" m_id="m_add" :m_input_show="true"></module-window>
        <module-window m_title="Изменение типа мероприятия" m_body="Введите новое значение для типа мероприятия" m_id="m_edit" :m_input_show="true"></module-window>
        <module-window m_title="Удаление типа мероприятия" m_body="Удаление типа мероприятия" m_id="m_del" :m_input_show="false"></module-window>
    </div>
@endsection

@push('scripts')
<script src="/vue/event_type/event_type.js"></script>
<script>
    $(function() {
        $('body').tooltip({
            selector: "[rel=tooltip]", // можете использовать любой селектор
            placement: "top"
        });
        this.current = '';
        $('tbody').on("click", "tr", function () {
            vm.current_id = $(this).find('td:eq(0)').text();
            vm.current_text = $(this).find('td:eq(1)').text();
        });
    });
</script>
@endpush