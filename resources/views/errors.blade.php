@if($errors->any())
<div class="row justify-content-center">
	<div class="col-md-8 mb-2">
		<div class="card bg-danger">
			<div class="card-body">
				@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>			
				@endforeach
			</div>
		</div>
	</div>
</div>
@endif