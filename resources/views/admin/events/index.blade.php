@extends('admin/layout')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<tr>
					<th>Название</th>
					<th>Описание</th>
					<th>Адрес</th>
					<th>Редактировать</th>
					<th>Удалить</th>
				</tr>
				@foreach ($events as $event)
					<tr>
						<td><a href="/admin/events/{{$event->id}}" class="btn"><span class="glyphicon glyphicon-zoom-in"></span> {{$event->name}}</a></td>
						<td>{{$event->descr}}</td>
						<td>{{$event->address}}</td>
						<td><a href="/admin/events/{{$event->id}}/edit" class="btn"><span class="glyphicon glyphicon-pencil"></span></a></td>
						<td>
							<span class="glyphicon glyphicon-minus"></span>
						</td>
					</tr>
				@endforeach
			</table>
			<a href="/admin/events/create" class="btn">Добавить новое <span class="glyphicon glyphicon-plus"></span></a>
		</div>
	</div>
@endsection