@extends('layouts.home')

@section('content')

	<div class="row">
	  <div class="col-lg-12">
	    <div class="page-header">
	      <h1 id="forms">Actualizar</h1>
	    </div>
	  </div>
	</div>

	<div class="row">

	  <div class="col-lg-8">
	    <div class="well bs-component">

	    	@include('layouts._formularioProducto',['producto'=>$producto])

	    </div>
	  </div>
	</div>
	
@endsection