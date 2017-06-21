@if($user->exists)
	<form class="form-horizontal" action="{{ route('updateUser',['user' => $user->id])}}" method="POST">
        {{ method_field('PUT')}}
		        
@else
	<form class="form-horizontal" action="{{ route('storeUser')}}" method="POST">
	
@endif

	<!-- Esto es para que el formulario funcion. -->
	{{csrf_field()}}

	<fieldset>
	  <legend>Usuario</legend>

	  <div class="form-group">
	    <label for="nombres" class="col-lg-2 control-label">Nombre</label>
	    <div class="col-lg-10">
	      <input type="text" class="form-control" name="nombres" id="inputNombres" placeholder="Nombres" value="{{ $user->name or old('nombres') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="apellidos" class="col-lg-2 control-label">Apellidos</label>
	    <div class="col-lg-10">
	      <input type="text" class="form-control" name="apellidos" id="inputApellidos" placeholder="Apellidos" value=" {{ $user->lastname or old('apellidos') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="documentoIdentidad" class="col-lg-2 control-label">Documento identidad</label>
	    <div class="col-lg-10">
	      <input type="text" class="form-control" name="documentoIdentidad" id="inputdocumentoIdentidad" placeholder="Documento de identidad" value=" {{ $user->docid or old('documentoIdentidad') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="nombreUsuario" class="col-lg-2 control-label">Nombre de usuario</label>
	    <div class="col-lg-10">
	      <input type="text" class="form-control" name="nombreUsuario" id="inputnombreUsuario" placeholder="Nombre de usuario" value=" {{ $user->username or old('nombreUsuario') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="password" class="col-lg-2 control-label">Password</label>
	    <div class="col-lg-10">
	      <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Nombre de usuario" value=" {{ old('password') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="email" class="col-lg-2 control-label">Email</label>
	    <div class="col-lg-10">
	      <input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email" value=" {{ $user->email or old('email') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-lg-10 col-lg-offset-2">
	      <a href="{{ route('indexUser') }}" class="btn btn-default">Cancelar</a>
	      @if($user->exists)
	      	<button type="submit" class="btn btn-primary">Guardar</button>
	      @else
      		<button type="submit" class="btn btn-primary">Registrarme</button>
	      @endif
	    </div>
	  </div>

	</fieldset>
	</form>