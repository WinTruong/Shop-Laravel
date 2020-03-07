@extends('master.master')
@section('content')
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li> {{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form action="" method="post">
		@csrf
		<input type="text" name="username">
		<input type="text" name="age">
		<input type="submit" name="submit">
	</form>
	
@endsection