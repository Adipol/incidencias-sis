@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading">Dashboard</div>

<div class="panel-body">
		@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="panel panel-success">
				<div class="panel-heading">
						<h3 class="panel-title">Incidencias asignadas a otros</h3>
				</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Proyecto</th>
							<th>Categoria</th>
							<th>Fecha de envio</th>
						</tr>
					</thead>
					<tbody>
	
						<tr>
						    <th>{{ $incident->id }}</th>
						    <th>{{ $incident->project->name }}</th>
						    <th>{{ $incident->category_name }}</th>
						    <th>{{ $incident->created_at }}</th>
						</tr>
			
					</tbody>
					<thead>
						<tr>
							<th>Asignada a</th>
							<th>Visibilidad</th>
							<th>Estado</th>
							<th>Severidad</th>
						</tr>
					</thead>
					<tbody>
	
						<tr>
							<th>{{ $incident->support_name }}</th>
							<th>Publico</th>
						    <th>{{ $incident->state }}</th>
						    <th>{{ $incident->severity_full }}</th>
						    
						</tr>
			
					</tbody>
				</table>
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th>Titulo</th>
							<td id="incident_summary">{{ $incident->title}}</td>
						</tr>
						<tr>
							<th>Descripción</th>
							<td id="incident_description">{{  $incident->description}}</td>
						</tr>
						<tr>
							<th>Adjuntos</th>
							<td id="incident_attachment"> No se han adjuntado archivos</td>
						</tr>
					</tbody>
				</table>
				<button class="btn btn-primary" style="" id="incident_btn_apply"> Atender Incidencia</button>
			</div>
		</div>
	</div>	
</div>

@endsection
