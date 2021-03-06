@extends('layouts.app')

@section('content')

<div class="panel panel-primary">
	<div class="panel-heading">Dashboard</div>

<div class="panel-body">
	@if(auth()->user()->is_support)

	<div class="panel panel-success">
		<div class="panel-heading">
				<h3 class="panel-title">Incidencias asignadas a mi</h3>
		</div>
		
	
		<div class="panel-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Código</th>
					<th>Categoria</th>
					<th>Severidad</th>
					<th>Estado</th>
					<th>Fecha creación</th>
					<th>Titulo</th>
				</tr>
			</thead>
			<tbody id="dashboard_my_incidents">
				@foreach($my_incidents as $incident)
 					<tr>
     					<td> <a href="/ver/{{$incident->id}}">{{ $incident->id }}</a> </td>
     					<td>{{ $incident->category->name}}</td>
					    <td>{{ $incident->severity_full }}</td>
					    <td>{{ $incident->state }}</td>
						<td>{{ $incident->created_at }}</td>						
					    <td>{{ $incident->title_short }}</td>
					</tr>

				@endforeach
			</tbody>
		</table>
	</div>
    </div>

	<div class="panel panel-success">
			<div class="panel-heading">
					<h3 class="panel-title">Incidencias sin asignar</h3>
			</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>Codigo</td>
						<th>Categoria</th>
						<th>Severidad</th>
						<th>Estado</th>
						<th>Fecha creación</th>
						<th>Titulo</th>
						<th>Opción</th>
					</tr>

				</thead>
				<tbody id="dashboard_no_responsible">
					@foreach($pending_incidents as $incident)
					<tr>
						<td> <a href="/ver/{{$incident->id}}">{{ $incident->id }}</a> </td>
						<th>{{ $incident->category_name}}</th>
						<th>{{ $incident->severity_full}}</th>
						<th>{{ $incident->state}}</th>
						<th>{{ $incident->created_at}}</th>
						<th>{{ $incident->title_short}}</th>
						<th>
							<a href="/ver/{{$incident->id}}" class="btn btn-primary btn-sm">
								Atender
							</a>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
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
							<th>Categoria</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Titulo</th>
							<th>Responsable</th>
						</tr>
					</thead>
					<tbody id="dashboard_by_me">
						@foreach($incidents_by_me as $incident)
						<tr>
							<td> <a href="/ver/{{$incident->id}}">{{ $incident->id }}</a> </td>
							<th>{{ $incident->category->name}}</th>
							<th>{{ $incident->severity_full}}</th>
							<th>{{ $incident->state}}</th>
							<th>{{ $incident->created_at}}</th>
							<th>{{ $incident->title_short}}</th>
							<th>{{ $incident->support_id ?: 'Sin asignar'}}</th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>

@endsection
