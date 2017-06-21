@extends('layouts.home')

@section('content')

	<div class="page-header">
	<h1 id="tables">Peticiones de perfil</h1>
	</div>

	<div class="bs-component">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre de usuario</th>
				<th>Perfil</th>
				<th>Aceptada</th>
			</tr>
		</thead>
		@foreach($request as $request)

			@if(!is_null(@request->aceptada))
				<tbody>
					<tr>
						<td>1</td>
						<td>{{$request->username}}</td>
						<td>{{$request->profile}}</td>
						<td>{{$request->aceptada}}</td>
						<td><small class="pull-right">
						 	<a href="{{ route('editRequest',['request' => $request->id]) }}" class="btn btn-info">Aceptar</a></small>
						</td>
						<td>
							<a href="{{ route('denegadaRequest',['request' => $request->id]) }}" class="btn btn-info">Denegar</a></small>
						</td>
					</tr>
				</tbody>
			@endif
	 	@endforeach
		</table> 
	</div><!-- /example -->


@endsection