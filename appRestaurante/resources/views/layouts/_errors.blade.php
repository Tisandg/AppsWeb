@if(count($errors) > 0)

	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<div id="charged-message" class="alert alert-info">
				<h4>Compruebe los datos ingresado!</h4>
			    @foreach($errors->all() as $error)
			        <li>{{ $error}}</li>
			    @endforeach
			</div>
		</div>
	</div>
      
@endif