@extends('layouts.home')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Registro cliente</div>
                  <div class="panel-body">

                    <form class="form-horizontal" action="{{ route('storeCustomer')}}" method="POST">

                      <!-- Esto es para que el formulario funcion. -->
                      {{csrf_field()}}
                      <fieldset>
                        <legend>Cliente</legend>

                        <div class="form-group">
                          <label for="nombre" class="col-lg-2 control-label">Nombre</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Nombres" value=" {{ old('nombre')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="apellido" class="col-lg-2 control-label">Apellidos</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" name="apellido" id="inputApellido" placeholder="Apellidos" value=" {{ old('apellido')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="documento" class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email" value=" {{ old('email')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="documento" class="col-lg-2 control-label">Documento identidad</label>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" name="documento" id="inputDocumento" placeholder="Documento de identidad" value=" {{ old('documento')}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <a href="{{ route('welcome')}}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Registrarme</button>
                          </div>
                        </div>

                      </fieldset>
                    </form>
                  </div>
                </div>
          </div>
    </div>
  

@endsection
