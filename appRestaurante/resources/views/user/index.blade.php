@extends('layouts.home')

@section('content')

	<div class="page-header">
	<h1 id="tables">Usuarios</h1>
	</div>

	<div class="bs-component">
	<div class="panel panel-primary">
	  <div class="panel-heading">
	    <h3 class="panel-title"></h3>
	  </div>
	  <div class="panel-body">
	    <table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Documento</th>
				<th>Nombre de usuario</th>
				<th>Email</th>
				<th>Perfil</th>
				<th>Pin</th>
				<th>Creado</th>
				<th>Acciones</th>
			</tr>
		</thead>
		@foreach($users as $user)
		<tbody>
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td><a href="{{ route('showUser',['user' => $user->id]) }}">{{$user->name}}</a></td>
				<td>{{$user->lastname}}</td>
				<td>{{$user->docid}}</td>
				<td>{{$user->username}}</td>
				<td>{{$user->email}}</td>
				@if( is_null($user->profile))
				<td>Pendiente</td>
				@else
					<td>{{$user->profile}}</td>
				@endif
				<td>{{$user->pin}}</td>
				<td>{{ $user->created_at->diffForHumans() }}</td>
				<td><small class="pull-right">
				 	<a href="{{ route('editUser',['user' => $user->id]) }}" class="btn btn-info">Editar</a></small>
				</td>
				<td>

					<form action="{{ route('deleteUser',['user' => $user->id]) }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('DELETE') }}
						<button type="submit" class="btn btn-danger">Eliminar</button>
					</form>
					
				</td>
			</tr>
		</tbody>

	 	@endforeach
		</table> 
	</div><!-- /example -->
	  </div>
	</div>

	


@endsection