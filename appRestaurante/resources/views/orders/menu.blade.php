@extends('layouts.home')

@section('content')

	<div class="page-header">
		<h1 id="tables">Menu
		</h1>
	</div>
	<div class="row">
	@for($j = 0; $j < count($productos); $j++)
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				@if(is_null($productos[$j]->image))
					<img src="..." alt="...">
				@else
					<img src="{{$productos[$j]->image}}" alt="Imagen comida" style="max-height: 150px" class="img-responsive">
				@endif
				<div class="caption">
					<h3>{{ $productos[$j]->name}}</h3>
					<p>{{ $productos[$j]->description }}</p>
					<div class="clearfix">
						<div class="pull-left"><h5><strong>${{ $productos[$j]->price }}</strong></h5></div>
						<a href="{{route('addProducto',['id' => $productos[$j]->idproduct ])}}" class="btn btn-success pull-right" role="button">Agregar</a> 
					</div>
				</div>
			</div>
		</div>
	@endfor
	</div>

@endsection