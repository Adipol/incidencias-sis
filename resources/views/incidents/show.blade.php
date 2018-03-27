@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading">Dashboard</div>

<div class="panel-body">


		@if (session('notification'))
		<div class="alert alert-success">
				{{ session('notification')}}
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
							<th>Nivel</th>
							<th>Estado</th>
							<th>Severidad</th>
						</tr>
					</thead>
					<tbody>
	
						<tr>
							<th>{{ $incident->support_name }}</th>
							<th>{{ $incident->level->name}}</th>
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

				@if($incident->support_id==null && $incident->active && auth()->user()->canTake($incident))
			    <a href="/incidencia/{{ $incident->id }}/atender" class="btn btn-primary btn-sm" id="incident_btn_apply"> Atender Incidencia</a>
				@endif

				@if(auth()->user()->id==$incident->client_id)
				 @if($incident->active)
				 <a  href="/incidencia/{{ $incident->id }}/resolver" class="btn btn-info btn-sm" id="incident_btn_apply"> Marcar como resuelto</a>
				 <a href="/incidencia/{{ $incident->id }}/editar" class="btn btn-success btn-sm"> Editar incidencia</a>
				 @else
				<a  href="/incidencia/{{ $incident->id }}/abrir" class="btn btn-info btn-sm" id="incident_btn_apply"> Volver a abrir Incidencia</a>
				@endif
			
				@endif



				@if(auth()->user()->id == $incident->support_id && $incident->active)
				<a href="/incidencia/{{ $incident->id }}/derivar" class="btn btn-danger btn-sm"  id="incident_btn_apply"> Derivar al siguiente nivel</a>
				@endif
				
			</div>		
		</div>
	</div>	
</div>
	@include ('layouts.chat')
@endsection
