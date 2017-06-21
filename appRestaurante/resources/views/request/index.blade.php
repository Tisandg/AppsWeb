@extends('layouts.home')

@section('content')

	<div class="page-header">
		<h1 id="tables">Peticiones perfiles
		</h1>
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
							<th>Nombre de usuario</th>
							<th>Perfil</th>
							<th>Aceptado</th>
							<th>Accion</th>
						</tr>
					</thead>
					@foreach($requests as $request)
					<tbody>
						<tr>
							<td>1</td>
							<td>{{$request->username}}</td>
							<td>{{$request->profile}}</td>
							<td>@if(is_null($request->aceptada))
								No	
							@endif</td>
							<td>
								<form class="form-horizontal" action="{{ route('updateRequest',['request' => $request->id])}}" method="POST">
			        				{{ method_field('PUT')}}
			        				{{csrf_field()}}
			        				<button type="submit" class="btn btn-info">Aceptar</button>
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