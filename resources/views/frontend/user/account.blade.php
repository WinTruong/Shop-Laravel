@extends('frontend.master.master')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<a href="/member/account" class="profiles"><h3>Profiles</h3></a>
					<input class="idUser" type="text" value="" hidden>
					<hr>
					<a href="/member/product" class="product"><h3>Product</h3></a>
				</div>

				<div class="col-sm-9 padding-right">
					<div class="infor">
						<form action="/member/account/" method="post">
							@csrf
							<div class="form-group">
							  <label for="">Name</label>
							  <input type="text" class="form-control nameMember" name="name" placeholder="{{ Auth::user()->name }}" >
							</div>
							<div class="form-group">
							  <label for="">Email</label>
							  <input type="email" class="form-control emailMember" name="emailMember" readonly="readonly" placeholder="{{ Auth::user()->email }}">
							</div>
							<div class="form-group">
							  <label for="">New Password</label>
							  <input type="password" class="form-control passwordMember" name="passwordMember" placeholder="New Password">
							</div>
							<div class="form-group">
							  <label for="">Confirm New Password</label>
							  <input type="password" class="form-control passwordMember" name="passwordMember" placeholder="Confirm New Password">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function () {
			function getMember(){
				var value = $('.idUser').val();
				$.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            }
		        }); 
				$.ajax({
					type: "post",
					url: "/member/account",
					data: {
						id : value
					},
					success: function (response) {
						var data = JSON.parse(response);
						$('.nameMember').val(data.name);
						$('.emailMember').val(data.email);
					}
				});
			};
			getMember();
		});
	</script>
@endsection