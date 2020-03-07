<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleWebController extends Controller
{
	public function index() {
		return view('frontend/index');
	}
	public function cart() {
		return view('frontend/cart');
	}
	public function blogSingle() {
		return view('frontend/blog-single');
	}
	public function blog() {
		return view('frontend/blog');
	}
	public function checkout() {
		return view('frontend/checkout');
	}
	public function contact() {
		return view('frontend/contact-us');
	}
	public function login() {
		return view('frontend/login');
	}
	public function productDetails() {
		return view('frontend/product-details');
	}
	public function sendemail() {
		return view('frontend/sendemail');
	}
	public function shop() {
		return view('frontend/shop');
	}
	public function error() {
		return view('frontend/404');
	}

}
