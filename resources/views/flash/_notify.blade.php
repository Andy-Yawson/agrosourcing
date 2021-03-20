@if($errors->all())
	<div class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</div>
@endif
@if (session('success'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		{{ session('success') }}
	</div>
@endif

@if (session('error'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		{{ session('error') }}
	</div>
@endif
