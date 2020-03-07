@extends('frontend.master.master')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					</div>
				</div>
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
							<div class="single-blog-post">
								<h3>{!!$getBlogListComment->tittle!!}</h3>
								<div class="post-meta">
									<ul>
										<li><i class="fa fa-user"></i>{{$user[0]}}</li>
										<li><i class="fa fa-clock-o"></i>{!!$getBlogListComment->created_at->toTimeString()!!}</li>
										<li><i class="fa fa-calendar"></i>{!!$getBlogListComment->created_at->toDateString()!!}</li>
									</ul>
									<span>
										<!-- cách của mình -->
									@if($vote)
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									@else
										@php $rating = $vote->avg('vote'); @endphp

										@foreach(range(1,5) as $i)
											@if($rating > 0)
												@if($rating > 0.5)
													<i class="fa fa-star"></i>
												@else
													<i class="fa fa-star-half-o"></i>
												@endif
											@endif
											@php $rating--; @endphp
										@endforeach
									@endif
									</span>
								</div>

								<!-- cách hiện đánh giá của anh Bảo -->

								<!-- <div class="rating-area">
									<ul class="ratings rate">
										<li>
									@ for($ i=1; $ i <= 5; $ i++)
										@ if($ i <= $ vote) 
											<i class="star_1 ratings_stars ratings_over"></i>
										@ else											
											<i class="star_3 ratings_stars"></i>
										@ endif
									@ endfor		
										</li>
									</ul>
								</div> -->
								<a href="">
									<img src="{!!asset('admin/assets/images/blogs/'.$getBlogListComment->image)!!}" alt="">
								</a>
								<span>
									{!!$getBlogListComment->content!!}
								</span>
								<div class="pager-area">
									<ul class="pager pull-right">
										@if($pre)
											<li>
												<a href="{{url('blog-details/'.$pre)}}">Pre</a>
											</li>
										@endif
										@if($next)
											<li>
												<a href="{{url('blog-details/'.$next)}}">Next</a>
											</li>
										@endif
									</ul>
								</div>
							</div>
					</div><!--/blog-post-area-->
					<div class="rating-area">
						@if(Auth::check())
						<ul class="ratings rate">
							<li class="rate-this">Rate this item:</li>
							<li>
								<i class="star_1 ratings_stars"><input value="1" type="hidden"></i>
								<i class="star_2 ratings_stars"><input value="2" type="hidden"></i>
								<i class="star_3 ratings_stars"><input value="3" type="hidden"></i>
								<i class="star_4 ratings_stars"><input value="4" type="hidden"></i>
								<i class="star_5 ratings_stars"><input value="5" type="hidden"></i>
								<!-- <form action="" class="rating" method="post">
									<input type="hidden" class="vote" name="vote" value="5">
								</form> -->
							</li>
							<li class="color">({{$vote->count()}} votes)</li>
						</ul>
						@endif
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-one.jpg" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div><!--Comments-->
					<div class="response-area">
						<h2>{{$count}} RESPONSES</h2>
						@if($count >= 1)
							<ul class="media-list">
							@foreach($getBlogListComment->comments as $comments)
								@if($comments->id_comment == 0)
									<li class="media">
										<a class="pull-left" href="#">
											<img class="media-object" src="{{asset('admin/assets/images/users/'.$comments->avatar)}}" alt="" style="width: 140px; height: 102px;">
										</a>
										<div class="media-body">
											<ul class="sinlge-post-meta">
												<li><i class="fa fa-user"></i>Unknown</li>
												<li><i class="fa fa-clock-o"></i>{{$comments->created_at->toTimeString()}}</li>
												<li><i class="fa fa-calendar"></i>{{$comments->created_at->toDateString()}}</li>
											</ul>
											<p>{{$comments->comment}}.</p>
											<a id="{{$comments->id}}" class="btn btn-primary sub-comment" href="#comment" href="#comment"><i class="fa fa-reply"></i>Reply</a>
										</div>
									</li>
									@foreach($comments->subComments as $subComments)
									<li class="media second-media">
										<a class="pull-left" href="#">
										<img class="media-object" src="{{asset('admin/assets/images/users/'.$subComments->avatar)}}" alt=""  style="width: 140px; height: 102px;">
										</a>
										<div class="media-body">
											<ul class="sinlge-post-meta">
												<li><i class="fa fa-user"></i>Unknown</li>
												<li><i class="fa fa-clock-o"></i>{{$comments->created_at->toTimeString()}}</li>
												<li><i class="fa fa-calendar"></i>{{$comments->created_at->toDateString()}}</li>
											</ul>
											<p>{{$subComments->comment}}.</p>
											<a id="{{$comments->id}}" class="btn btn-primary sub-comment" href="#comment"><i class="fa fa-reply"></i>Reply</a>
										</div>
									</li>
									@endforeach
								@endif
							@endforeach
							</ul>	
						@endif
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-4">
								<h2>Leave a replay</h2>
								<form>
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span>*</span>
									<input type="text" placeholder="write your name...">
									<div class="blank-arrow">
										<label>Email Address</label>
									</div>
									<span>*</span>
									<input type="email" placeholder="your email address...">
									<div class="blank-arrow">
										<label>Web Site</label>
									</div>
									<input type="email" placeholder="current city...">
								</form>
							</div>
							<form action="" method="post" class="comment">
								@csrf
								<div class="col-sm-8">
									@if($errors->any())
			                            <div class="alert alert-danger">
			                                <ul>
			                                    @foreach($errors->all() as $error)
			                                        <li>{{$error}}</li>
			                                    @endforeach
			                                </ul>
			                            </div>
			                        @endif
									<div class="text-area">
										<div class="blank-arrow">
											<label>Comment</label>
										</div>
										<span>*</span>
										<input value="" class="id_comment" type="hidden" name="id_comment" >
										<textarea id="comment" class="comment" name="comment" rows="11">{{ old('comment') }}</textarea>
										<button type="submit">Post comment</button>
										<div class="alert">
											<ul>
		                                        <li></li>
			                                </ul>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div><!--/Repaly Box-->
				</div>	
			</div>
		</div>
	</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		// Kiểm tra đã đăng nhập chưa
		$("form.comment").submit(function(){
			var checkLog = <?= Auth::check() ? 'true' : 'false' ?>;
			var getClass = $(this).find("div.alert").attr("class");
			if(checkLog == true && $(this).find('textarea').val() != false) {
				$('div.alert').removeClass('alert-danger');
				$('div.alert').find('li').html("");
				console.log(checkLog);
				console.log(getClass);
				return true;
			} else {
				$('div.'+getClass).addClass('alert-danger');
				$('div.'+getClass).find('li').html("Có lỗi, xin hãy đăng nhập.");
				console.log(getClass);
			}
			return false;
		});

		// Gán id cho replies comment
		$("a.sub-comment").click(function() {
			var getId = $(this).attr("id");
			console.log(getId);
			$("input.id_comment").val(getId);
		});

		// 

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });
	    $('.ratings_stars').click(function(){
	        
	        // alert(Values);
	        if ($(this).hasClass('ratings_over')) {
	            $('.ratings_stars').removeClass('ratings_over');
	            $(this).prevAll().andSelf().addClass('ratings_over');
	        } else {
	            $(this).prevAll().andSelf().addClass('ratings_over');
	        }
	        // 

	        var values =  $(this).find("input").val();
	        var getBlogId = <?= $getBlogListComment->id ?>;

	        console.log(getBlogId);

	        $.ajax({
	            url: "/blog/ajax",
	            type: "post",
	            data: {
	            	blog_id: getBlogId,
	            	vote: values, 
	            	 },
	            success: function (response) {
	               // console.log(response);
	                alert(response);

	            },
	            error: function (error) {
	                //console.log(error);
	            }
	        });
	    });
	});
</script>
@endsection

