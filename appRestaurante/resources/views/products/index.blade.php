@extends('layouts.home')

@section('content')

	<div class="page-header">
		<h1 id="tables">Productos
		<small class="pull-righ">
			<a href="{{ route('createProducto') }}" class="btn btn-info">Crear Producto</a>
		</small>
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
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Precio</th>
							<th>Imagen</th>
							<th>Creado</th>
							<th>Acciones</th>
						</tr>
					</thead>
					@foreach($productos as $producto)
					<tbody>
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td><a href="{{ route('showProducto',['producto' => $producto->idproduct]) }}">{{$producto->name}}</a></td>
							<td>{{$producto->description}}</td>
							<td>{{$producto->price}}</td>
							@if(is_null($producto->image))
								<td>No hay imagen</td>
							@else
								<td><img class="col-sm-6" id="preview"  src="{{ $producto->image }}"></img></td>
							@endif
							
							<td>{{ $producto->created_at->diffForHumans() }}</td>
							<td><small class="pull-right">
							 	<a href="{{ route('editProducto',['producto' => $producto->idproduct]) }}" class="btn btn-info">Editar</a></small>
							</td>
							<td>
								<form action="{{ route('deleteProducto',['producto' => $producto->idproduct]) }}" method="POST">
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