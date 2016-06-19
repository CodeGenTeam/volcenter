@extends('layouts.main')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <form action="user/{{ $user->id }}" method="POST">
            	{{ csrf_field() }}
            	{{ method_field('PUT') }}

            	<div class="form-group">
            		<div class="col-md-6">
	            		<label for="email">Email: </label>
	            		<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $user->email }}">
	            	</div>
            	</div>

            	<div class="form-group">
            		<div class="col-md-6">
	            		<label for="firstname">Имя: </label>
	            		<input type="text" name="firstname" class="form-control" id="firstname" placeholder="Имя" value="{{ $user->firstname }}">
	            	</div>
            	</div>

            	<div class="form-group">
            		<div class="col-md-6">
	            		<label for="lastname">Фамилия: </label>
	            		<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Фамилия" value="{{ $user->lastname }}">
	            	</div>
            	</div>

            	<div class="form-group">
            		<div class="col-md-6">
	            		<label for="middlename">Отчество: </label>
	            		<input type="text" name="middlename" class="form-control" id="middlename" placeholder="Отчество" value="{{ $user->middlename }}">
	            	</div>
            	</div>

            	<div class="form-group">
            		<div class="col-md-6">
	            		<label for="birthday">Дата рождения: </label>
	            		<input type="text" name="birthday" class="form-control" id="birthday" placeholder="Отчество" value="{{ $user->birthday }}">
            		</div>
            	</div>

				<div class="form-group">
            		<div class="col-md-6">
            			<button type="submit" class="btn btn-primary">Обновить</button>
            		</div>
            	</div>
            </form>

            <form action="/user/{{ $user->id }}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}

				<div class="form-group">
	        		<div class="col-md-6">
	        			<button type="submit" class="btn btn-danger">Удалить аккаунт</button>
	        		</div>
        		</div>
			</form>

        </div>
    </div>

</div>
<script>
	$(document).on('focus', '#birthday', function() {
		$('#birthday').datetimepicker({
			'format': 'YYYY-MM-DD'
		});
	});
</script>

@endsection