<script>

function preview()
{
	var imagen;
	var pathImagen;
	
	pathImage = document.getElementById("imagen");
	pathImage = pathImage.value;

	document.images("preview").src=pathImagen;
}

</script>

@if($producto->exists)
	<form class="form-horizontal" action="{{ route('updateProducto',['producto' => $producto->idproduct])}}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT')}}
		        
@else
	<form class="form-horizontal" action="{{ route('storeProducto')}}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
	
@endif

	<!-- Esto es para que el formulario funcion. -->
	{{csrf_field()}}

	<fieldset>
	  <legend>Productos</legend>

	  <div class="form-group">
	    <label for="nombre" class="col-lg-2 control-label">Nombre</label>
	    <div class="col-lg-10">
	      <input type="text" class="form-control" name="nombre" id="inputNombre" placeholder="Nombre" value="{{ $producto->name or old('nombres') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="descripcion" class="col-lg-2 control-label">Descripcion</label>
	    <div class="col-lg-10">
	      <input type="text" class="form-control" name="descripcion" id="inputDescripcion" placeholder="Descripcion" value=" {{ $producto->description or old('descripcion') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="precio" class="col-lg-2 control-label">Precio </label>
	    <div class="col-lg-10">
	      <input type="text" class="form-control" name="precio" id="inputPrecio" placeholder="Precio" value=" {{ $producto->price or old('precio') }}">
	    </div>
	  </div>

	  <div class="form-group">
	    <label for="imagen" class="col-lg-2 control-label">Imagen </label>
	    <div class="col-lg-10">
	    	@if($producto->exists)
				<img class="col-sm-6" id="preview"  src="{{ $producto->image }}" ></img>
			@else
				<img class="col-sm-6" id="preview"  src="" ></img>
			@endif
	      	<input data-preview="#preview" type="file" class="form-control" name="imagen" id="imagen" value=" {{ $producto->image or old('imagen') }}" onchange="preview()">
	      	
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-lg-10 col-lg-offset-2">
	      <a href="{{ route('indexProducto') }}" class="btn btn-default">Cancelar</a>
	      @if($producto->exists)
	      	<button type="submit" class="btn btn-primary">Guardar</button>
	      @else
      		<button type="submit" class="btn btn-primary">Registrar</button>
	      @endif
	    </div>
	  </div>

	</fieldset>
	</form>