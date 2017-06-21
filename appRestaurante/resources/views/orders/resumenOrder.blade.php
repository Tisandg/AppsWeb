@extends('layouts.home')

@section('content')

	<div class="page-header">
		<h1 id="tables">Carro de compras
		</h1>
	</div>
	
	@if(Session::has('order'))
	<div class="bs-component">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
		    	<h3 class="panel-title">Resumen</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="row">
					<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
						<ul class="list-goup">
							@foreach($productos as $producto)
								<li class="list-group-item">
									<span class="badge">{{ $producto['cantidad'] }}</span>
									<strong>{{ $producto['producto']['name'] }}</strong>
									<span class="label labe-success">{{ $producto['precio'] }}</span>
									<div class="btn-group">
										<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
											Accion <span class="caret"></span>
											<ul class="dropdown-menu">
												<li>
													<a href="#">Reducir 1</a>
													<a href="#">Reducir todo</a>
												</li>
											</ul>
										</button>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
					<strong>Total: {{ $totalPrecio }}</strong>
					</div>	
				</div>
				<div class="row">
					<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
						<a href="{{ route('confirmOrder') }}" class="btn btn-primary">Confirmar</a>
					</div>	
				</div>
			</div>
		</div>
	</div>
	@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
				<h2>No hay productos en el carrito </h2>
			</div>	
		</div>
	@endif

@endsection