@extends('layouts.home')

@section('content')

	<div class="page-header">
		<h1 id="tables">Ordenes pedidas
		</h1>
	</div>

	<div class="bs-component">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
		    	<h3 class="panel-title"></h3>
		  	</div>
		  	<div class="panel-body">
				<table class="table table-striped table-hover stripded">
				<thead>
				  <tr>
				    <th>#</th>
				    <th>Id</th>
				    <th>Resumen</th>
				    <th>Estado</th>
				    <th>Acciones</th>
				  </tr>
				</thead>

				@foreach($listaOrdenes as $orden)
					@if( (strcmp(Auth::User()->profile,'Cocinero') == 0) && $orden[2] == 3)

					@else
				    <tbody>
				    	<tr>
				    		<td>{{ $loop->iteration }}</td>
				            <td>{{ $orden[0] }}</td>
				            <td>
				        		@foreach($orden[1] as $producto)
				                	{{ $producto[1]}} {{ $producto[0] }},
				          		@endforeach	
				      		</td>
				      		<td>
				      			@if($orden[2] == 1)
				      				Sin preparar
				      			@endif
				      			@if($orden[2] == 2)
				      				En preparacion
				      			@endif
				      			@if($orden[2] == 3)
				      				Lista para entregar
				      			@endif
				      			@if($orden[2] == 4)
				      				Entregada
				      			@endif
				      			@if($orden[2] == 5)
				      				Cancelada
				      			@endif
				      		</td>
				      		@if( strcmp(Auth::User()->profile,'Cocinero') == 0 )
				      			<td>
				          			@if($orden[2] == 1)

								 		<a href="{{ route('atenderOrden',['idOrden' => $orden[0]]) }}" class="btn btn-info">Atender orden</a>
				          			@endif
				          			@if($orden[2] == 2)

								 		<a href="{{ route('ordenLista',['idOrden' => $orden[0]]) }}" class="btn btn-info">Terminada</a>
				          			@endif
								</td>
				      		@endif

				      		@if( strcmp(Auth::User()->profile,'Mesero') == 0 )
				      			<td>
				          			@if($orden[2] == 3)
								 		<a href="{{ route('entregarOrden',['idOrden' => $orden[0]]) }}" class="btn btn-info">Cambiar a entregada</a>
				          			@endif
								</td>
				      		@endif
				  		</tr>
				    </tbody>
				    @endif
				@endforeach
				</table> 
      		</div>
      	</div>
    </div>

@endsection