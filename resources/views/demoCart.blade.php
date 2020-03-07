@extends('master.master')
	

@section('content')

	<?php

		// unset($_SESSION['cart']);
		echo "<pre>";

		if(isset($_SESSION['cart'])) {
			//$prod_id_arr = [];
			$cart = [];

			// foreach ($_SESSION['cart'] as $key => $value) {
			// 	$prod_id_arr[] = $value['id'];
			// }

			foreach ($_SESSION['cart'] as $key => $value) {
				$sql = "SELECT * FROM `products` WHERE `idproduct` = '".$value['id']."' ";
				if($result = $con->query($sql)) {
					if($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$row['qty'] = $value['qty'];
							$cart[] = $row;
						}
					}
				}
			}

			// foreach ($_SESSION['cart'] as $key => $value) {
			// 	foreach ($cart as $cartkey => $cartvalue) {
			// 		if($cartvalue['idproduct'] === $value['id']) {
			// 			$cart[$cartkey]['qty'] = $value['qty'];
			// 		}
			// 	}
			// }

			var_dump($cart);
			
		}
	 
		echo "</pre>";
	?>



	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
<?php
	$price_total = 0;
	$cart_all = 0;
	if(!isset($cart) || empty($_SESSION['id'])) {
		echo "<tr><td><h2>cart empty</h2></td></tr>";
	} else {
		foreach ($cart as $key => $value) {
?>
			<tr>
				<td class="cart_product">
					<a href=""><img src="upload/<?= $value['image']?>" alt="" style="width: 110px;"></a>
				</td>
				<td class="cart_description">
					<h4><a href=""><?php echo $value['productname']; ?></a></h4>
					<p>Web ID: <?= $value['idproduct']?></p>
				</td>
				<td class="cart_price">
					<p>$<?= $value['price']?></p>
				</td>
				<td class="cart_quantity">
					<div class="cart_quantity_button">
						<a class="cart_quantity_up"> +</a>
						<input class="cart_quantity_input" type="text" name="quantity" value="<?= $value['qty']?>" autocomplete="off" size="2">
						<a class="cart_quantity_down"> -</a>
						<input type="hidden" class="id" name="id" value="<?= $value['idproduct']?>">
						<input type="hidden" class="tittle" name="tittle" value="<?= $value['productname']?>">
						<input type="hidden" class="price" name="price" value="<?= $value['price']?>">
					</div>
				</td>
				<td class="cart_total">
					<?php
						$item_price_total = $value['qty']*$value['price'];
					?>
					<p class="cart_total_price">
						$<?= $item_price_total?>
					</p>
					<input type="hidden" name="item_price_total" class="item_price_total" value="<?=$item_price_total?>">
				</td>
				<td class="cart_delete">
					<a class="cart_quantity_delete"><i class="fa fa-times"></i></a>
				</td>

			</tr>
<?php
			$price_total = $price_total + ($cart[$key]['price'] * $cart[$key]['qty']);
			$cart_all = $cart_all + $cart[$key]['qty'];
		}
	}
?>
			<tr>
				<td class="col-sm-4 col-sm-push-7">
					<span class="cartAll"><?=$cart_all?></span>
				</td>
			</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total
								
								<span id="priceTotal">$<?= $price_total ?></span>
								<input type="hidden" id="price_total" name="price_total" 
								value="<?= $price_total ?>" >
							</li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Order Status</a></li>
								<li><a href="">Change Location</a></li>
								<li><a href="">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">T-Shirt</a></li>
								<li><a href="">Mens</a></li>
								<li><a href="">Womens</a></li>
								<li><a href="">Gift Cards</a></li>
								<li><a href="">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Terms of Use</a></li>
								<li><a href="">Privecy Policy</a></li>
								<li><a href="">Refund Policy</a></li>
								<li><a href="">Billing System</a></li>
								<li><a href="">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Company Information</a></li>
								<li><a href="">Careers</a></li>
								<li><a href="">Store Location</a></li>
								<li><a href="">Affillate Program</a></li>
								<li><a href="">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
    <script>
		$(document).ready(function() {
			$("a.cart_quantity_up").click(function() {
				// Tao bien dung ajax
			 	var getId = $(this).parent().find("input.id").val();
			 	var getTittle = $(this).parent().find("input.tittle").val();
			 	var getQty = $(this).parent().find("input.cart_quantity_input").val();
			 	var getFlag = 1;

			 	var getPrice = $(this).parent().find("input.price").val();
		 		var getTotal = $("#price_total").val();

				// tinh tong tat ca gio hang
				getTotal = parseInt(getTotal) + parseInt(getPrice);
				
				$("#price_total").val(getTotal);
				$("#priceTotal").html("$"+getTotal);

				// Them so luong
		 		getQty = parseInt(getQty) + 1;
		 		$(this).parent().find("input.cart_quantity_input").val(getQty);
		 		
		 		// tinh tong 1 mon hang
		 		getPrice = parseInt(getPrice) * getQty;
		 		$(this).closest("tr").find("p.cart_total_price").html("$"+getPrice);

		 		

		 		$.ajax({
			        url: "ajaxCart.php",
			        type: "post",
			        data: {qty:getQty, id:getId, tittle:getTittle, flag:getFlag},
			        success: function (response) {

			           // You will get response from your PHP page (what you echo or print)
			        },
			        error: function(jqXHR, textStatus, errorThrown) {
			           console.log(textStatus, errorThrown);
			        }
				});
			})

			$("a.cart_quantity_down").click(function() {
				// Tao bien dung ajax
			 	var getId = $(this).parent().find("input.id").val();
			 	var getTittle = $(this).parent().find("input.tittle").val();
			 	var getQty = $(this).parent().find("input.cart_quantity_input").val();
			 	var getFlag = 0;

			 	var getPrice = $(this).parent().find("input.price").val();
			 	var getTotal = $("#price_total").val();

			 	// tinh tong gia tien ca gio hang
			 	getTotal = parseInt(getTotal) - parseInt(getPrice);
				$("#price_total").val(getTotal);
				$("#priceTotal").html("$"+getTotal);
				console.log(getTotal);

			 	// giam so luong mat hang
				getQty = parseInt(getQty) - 1;
		 		$(this).parent().find("input.cart_quantity_input").val(getQty);
		 		// Tinh tong mot mat hang
		 		getPrice = parseInt(getPrice) * getQty;
		 		$(this).closest("tr").find("p.cart_total_price").html("$"+getPrice);
		 		// Kiem tra xem mat hang bi xoa hay chua
		 		getQty = parseInt(getQty) + 1;
		 		if(getQty == 1) {
					$(this).closest("tr").hide();
		 		}

		 		// tinh tong gia tien 1 mat hang

				$.ajax({
					url: "ajaxCart.php",
					type: "post",
					data: {qty:getQty, id:getId, tittle:getTittle, flag:getFlag},
					success: function (response) {
						
					},
					error: function (error) {
						console.log(error);
					}
				});
			})

			$("a.cart_quantity_delete").click(function() {
				var getId = $(this).closest("tr").find("input.id").val();
				// var getTittle = $(this).closest("tr").find("input.tittle").val();
				// var getQty = 1;
				var getFlag = 2;

				var getPrice = $(this).closest("tr").find("input.item_price_total").val();
				var getTotal = $("#price_total").val();

				getTotal = parseInt(getTotal) - parseInt(getPrice);
				$("#price_total").val(getTotal);
				$("#priceTotal").html("$"+getTotal);
				$(this).closest("tr").hide();

				$.ajax({
					url: "ajaxCart.php",
					type: "post",
					data: {id:getId,flag: getFlag},
					success: function (response) {

					},
					error: function (jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);
					}
				});
			})			
		})
	</script>

@endsection
	