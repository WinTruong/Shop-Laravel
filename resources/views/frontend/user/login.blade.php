@extends('frontend.master.master')
@section('content')
	<section id="form" style="margin: auto;"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-md-6" style="float: none; margin: auto;">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						@if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li> {{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
						<form action="" method="post">
							@csrf
							<input type="text" name="email" placeholder="Email Address" />
							<input type="password" name="password" placeholder="Password" />
							<span>
								<input type="checkbox" name="remember" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection