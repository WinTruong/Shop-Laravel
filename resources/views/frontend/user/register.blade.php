@extends('frontend.master.master')
@section('content')
	<section id="form" style="margin-top: 0;"><!--form-->
		<div class="container">
   			<div class="row">
				<div class="col-md-8" style="float: none;margin: auto;">
					<div class="signup-form"><!--sign up form-->
						<h2 style="text-align: center;">New User Signup!</h2>
						@if(Session::has('error'))
							<div class="alert alert-danger">
								<ul>
									<li>{!!Session::get('error')!!}</li>
								</ul>
							</div>
						@endif
						<form action="" method="post">
							@csrf

							<input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
							@error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
							<!-- <input type="email" name="email" placeholder="Email Address"/> -->
							@error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

							<input type="password" name="password" placeholder="Password">
							@error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
							<button type="submit" class="btn btn-default" style="margin: auto;">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection