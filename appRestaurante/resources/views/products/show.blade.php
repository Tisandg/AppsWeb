@extends('layouts.home')

@section('content')

    <div class="page-header">
      <h1 id="tables">Producto</h1>
    </div>
     
    <div class="bs-component">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Creado</th>
          </tr>
        </thead>
          <tbody>
            <tr>
              <td>{{$producto->name}}</td>
              <td>{{$producto->description}}</td>
              <td>{{$producto->price}}</td>
              <td>{{ $producto->created_at->diffForHumans() }}</td>
            </tr>
          </tbody>
      </table> 
    </div><!-- /example -->

@endsection