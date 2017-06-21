@extends('layouts.home')

@section('content')

	<div class="page-header" id="banner">
	    <div class="row">
	      <div class="bs-component">
	          <div class="jumbotron">
	            <h1>Ingresa</h1>
	            <p>Registrate a la aplicacion</p>
	            <p><a class="btn btn-primary btn-lg" href=" {{ route('createCustomer')}}">Registrarse como cliente</a></p>
	            <p><a class="btn btn-primary btn-lg" href=" {{ route('register') }}">Registrarse como usuario</a></p>
	          </div>
	        </div>
	    </div>
  	</div>

@endsection
