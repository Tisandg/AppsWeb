@extends('layouts.home')

@section('content')

	<div class="page-header">
		<h1 id="tables">Menu
		</h1>
	</div>
	<div class="bs-component">
		<div class="panel panel-primary">
		  	<div class="panel-heading">
		    	<h3 class="panel-title">Resumen</h3>
		  	</div>
		  	<div class="panel-body">
				<div class="row">
					<div class="col-sm-6 col-md-4  col-md-offset-4 col-sm-offset-3">
						<h1>Confirmar pedido</h1>
						<h4>Atentido por: {{ $mesero->name }} {{ $mesero->lastname}} </h4>
						<form action="{{ route('storeOrder') }}" method="POST" id="formConfirmOrder">
						{{ csrf_field() }}
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="pinwaiter">Pin Mesero </label>
										<input type="text" name="pinwaiter" id="inputPinwaiter" value="{{ $mesero->pin }}" disabled>		
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label for="total">Total pedido </label>
										<input type="text" name="total" id="inputTotal" value="{{ $total }}" disabled>		
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label for="pinClient">Pin cliente </label>
										<input type="text" name="pinclient" id="inputPinClient" placeholder="Pin" required min="4" maxlength="4">		
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-success">Confirmar orden</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection