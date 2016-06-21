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
	            		<input type="text" name="firstname" class="form-control" id="firstname" placeholder="Имя" value="Степан">
	            	</div>
            	</div>

            	<div class="form-group">
            		<div class="col-md-6">
	            		<label for="lastname">Фамилия: </label>
	            		<input type="text" name="lastname" class="form-control" id="lastname" placeholder="Фамилия" value="Паламарчук">
	            	</div>
            	</div>

            	<div class="form-group">
            		<div class="col-md-6">
	            		<label for="middlename">Отчество: </label>
	            		<input type="text" name="middlename" class="form-control" id="middlename" placeholder="Отчество" value="Арсеньевич">
	            	</div>
            	</div>

            	<div class="form-group">
            		<div class="col-md-6">
	            		<label for="birthday">Дата рождения: </label>
	            		<input type="text" name="birthday" class="form-control" id="birthday" placeholder="Отчество" value="30-06-2000">
            		</div>
            	</div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="phone">Номер телефона: </label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Номер телефона" value=" 89045563954">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="home_place">Адрес проживания: </label>
                        <input type="text" name="home_place" class="form-control" id="home_place" placeholder="Адрес проживания" value="Ул. Ленина д. 56 кв. 6">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-6">
                        <h1>Профили</h1>
                        <label for="skype_profile">Skype: </label>
                        <input type="text" name="skype_profile" class="form-control" id="skype_profile" placeholder="Профиль скайп" value="mrkeezy67">
                        <label for="vk_profile">Вконтакте: </label>
                        <input type="text" name="vk_profile" class="form-control" id="vk_profile" placeholder="Профиль Вконтакте" value="vk.com/flaffen">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="study">Учебное заведение: </label>
                        <input type="text" name="study" class="form-control" id="study" placeholder="Адрес проживания" value="ЮУрГУ">

                        <label for="study-start">Начало обучения</label>
                        <input type="text" class="form-control" id="study-start" value="2010">

                        <label for="study-end">Конец обучения</label>
                        <input type="text" class="form-control" id="study-end" value="2016">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <label for="birthday">Уровень владения языком: </label>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="english-level" class="form-control">
                                            <option value="low-intermediate">Английский</option>
                                            <option value="intermediate">Испанский</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="english-level" class="form-control">
                                            <option value="low-intermediate">Low intermediate</option>
                                            <option value="intermediate">Intermediate</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary pull-right">Добавить язык</button>
                    </div>
                </div>
                
                <div class="btn-group inline pull-left" data-toggle="buttons-checkbox"> 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Обновить</button>
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

    $(document).on('focus', '#study-start', function() {
        $('#study-start').datetimepicker({
            'format': 'YYYY-MM-DD'
        });
    });

    $(document).on('focus', '#study-end', function() {
        $('#study-end').datetimepicker({
            'format': 'YYYY-MM-DD'
        });
    });

</script>

@endsection