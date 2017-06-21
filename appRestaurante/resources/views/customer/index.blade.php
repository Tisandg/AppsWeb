@extends('layouts.home')

@section('content')

    <div class="page-header">
      <h1 id="tables">Customers</h1>
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
            <th>Creado</th>
          </tr>
        </thead>
        @foreach($customers as $customer)
            <tbody>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('showCustomer',['customer' => $customer->iduser]) }}">{{$customer->name}}</a></td>
                <td>{{$customer->lastname}}</td>
                <td>{{$customer->docid}}</td>
                <td>{{$customer->email}}</td>
                <td>{{ $customer->created_at->diffForHumans() }}</td>
              </tr>
            </tbody>
        @endforeach
      </table> 
      {{ $customers->render() }}
    </div><!-- /example -->

@endsection