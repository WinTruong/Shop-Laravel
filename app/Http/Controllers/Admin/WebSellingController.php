<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;

class WebSellingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() 
    {
        return view('admin/index');
    }

    public function demoCart()
    {
        return view('demoCart');
    }
    public function errors()
    {
        return view('admin/error-404');
    }
    // public function country()
    // {
    //     $countries = country::select('name_country')->get();
    //     return view('admin/country', compact('countries'));
    // }
    // public function getAddCountry()
    // {
    //     return view('admin/add-country');
    // }
   
    // public function postAddCountry(AddCountryRequest $request)
    // {
    //     $newc = new country();
    //     $newc->name_country = $request->name_country;
    //     $newc->save();
    //     return redirect('/admin/countries'); //RouteServiceProvider::HOME
    // }

    



    public function formBasic()
    {
        return view('admin/form-basic');
    }
     public function iconMaterial()
    {
        return view('admin/icon-material');
    }
     public function starterKit()
    {
        return view('admin/starter-kit');
    }
     public function tableBasic()
    {
        return view('admin/table-basic');
    }

}
