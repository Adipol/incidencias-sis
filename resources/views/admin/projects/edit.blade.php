@extends('layouts.app')

@section('content')

<div class="panel panel-default">
		<div class="panel-heading">Editar Usuario</div>

	<div class="panel-body">

		@if(session('notification'))
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
		    <input type="text" name="name" class="form-control" value="{{ old('name', $project->name)}}">
		</div>

		<div class="form-group">
			<label for="description">Descripcion</label>
			<input type="text" name="description" class="form-control" value="{{ old('description',$project->description)}}">
		</div>
		
		<div class="form-group">
			<label for="password">Fecha de Inicio</label>
			<input type="date" name="start" class="form-control" value="{{ old('start',$project->start)}}">
		</div>

		<div class="form-group">
			<button class="btn btn-primary">Guardar Proyecto</button>
		</div> 

	</form>

	<div class="row">
		<div class="col-md-6">
			<p>Categorias</p>
			<form action="/categorias" method="POST" class="form-inline">
				<div class="form-group">
					<input type="text" placeholder="ingrese nombre" class="form-control">
				</div>
				<div>
					<button class="btn btn-primary">Añadir</button>
				</div>
			</form>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>CatXYZ</td>
						<td>
							<a href="" class="btn btn-sm btn-primary">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
							<a href="" class="btn btn-sm btn-danger">
									<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-6">
			<p>NIveles</p>
			<form action="/niveles" method="POST" class="form-inline">
			<div class="form-group">
				<input type="text" placeholder="ingrese nombre" class="form-control">
			</div>
			<div>
				<button class="btn btn-primary">Añadir</button>
			</div>
		    </form>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Nivel</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>N1</td>
						<td>Atencion basica</td>
						<td>
							<a href="" class="btn btn-sm btn-primary">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
							<a href="" class="btn btn-sm btn-danger">
									<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	  </div>
	</div>
</div>

@endsection
