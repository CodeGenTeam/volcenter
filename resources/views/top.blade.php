@extends('layouts.main')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Топ волонтёров:</h1>
        </div>
    </div>

	<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-hover">
            	<th>Имя</th>
            	<th>Баллы</th>
            	<tbody>
        			<tr>
        				<td><a href="/user/1">Паламарчук Степан</a></td>
        				<td>100</td>
        			</tr>
        			<tr>
        				<td><a href="/user/2">Кутлиахметов Руслан</a></td>
        				<td>99</td>
        			</tr>
        			<tr>
        				<td><a href="/user/3">Пеклер Александр</a></td>
        				<td>2</td>
        			</tr>
            	</tbody>
            </table>
        </div>
    </div>

</div>

@endsection