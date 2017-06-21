@if(Session::has('success'))
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<div id="charged-message" class="alert alert-success">
				{{Session::get('success')}}
			</div>
		</div>
	</div>
@endif

@if(Session::has('info'))
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
			<div id="charged-message" class="alert alert-info">
				{{Session::get('info')}}
			</div>
		</div>
	</div>
@endif