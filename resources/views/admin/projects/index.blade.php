@extends('layouts.app')

@section('content')

<div class="panel panel-default">
		<div class="panel-heading">Usuario</div>

	<div class="panel-body">

		@if (session('notification'))
			<div class="alert alert-success">
				{{ session('notification')}}
			</div>
		@endif

		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<form action="" method="POST">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="email">Nombre</label>
		    <input type="text" name="name" class="form-control" value="{{ old('name')}}">
		</div>

		<div class="form-group">
			<label for="description">Descripcion</label>
			<input type="text" name="description" class="form-control" value="{{ old('description')}}">
		</div>
		
		<div class="form-group">
			<label for="start">Fecha de Inicio</label>
			<input type="date" name="start" class="form-control" value="{{ old('start',date('Y-m-d'))}}">
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Registrar Proyecto</button>
		</div>  
	</form>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Fecha de inicio</th>	
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($projects as $project)
			<tr>
				<td>{{$project->name}}</td>
				<td>{{$project->description}}</td>
				<td>{{$project->start ?: 'No se ha indicado'}}</td>
				
				<td>
					<a href="/proyectos/{{$project->id}}" class="btn btn-sm btn-primary">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<a href="/proyectos/{{$project->id}}/eliminar" class="btn btn-sm btn-danger">
							<span class="glyphicon glyphicon-trash"></span>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	
	</div>
</div>

@endsection
