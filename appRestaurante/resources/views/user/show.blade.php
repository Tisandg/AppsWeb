@extends('layouts.home')

@section('content')

    <div class="page-header">
      <h1 id="tables">user Individual</h1>
    </div>
     
    <div class="bs-component">
      <table class="table table-striped table-hover ">

        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Documento</th>
            <th>Nombre de usuario</th>
            <th>Email</th>
            <th>Pin</th>
            <th>Creado</th>
          </tr>
        </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>{{$user->name}}</td>
              <td>{{$user->lastname}}</td>
              <td>{{$user->docid}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->pin}}</td>
              <td>{{ $user->created_at->diffForHumans() }}</td>
            </tr>
          </tbody>
      </table> 
    </div><!-- /example -->

@endsection