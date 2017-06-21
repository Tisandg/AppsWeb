@extends('layouts.home')

@section('content')

      <div class="page-header">
        <h1 id="tables">Customer</h1>
      </div>
       
      <div class="bs-component">
        <table class="table table-striped table-hover ">

          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Documento</th>
              <th>Email</th>
              <th>Pin</th>
              <th>Creado</th>
            </tr>
          </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->lastname}}</td>
                <td>{{$customer->docid}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->pin}}</td>
                <td>{{ $customer->created_at->diffForHumans() }}</td>
              </tr>
            </tbody>
        </table> 
      </div><!-- /example -->

@endsection