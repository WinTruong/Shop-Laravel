<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\country;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CountryRequest;
// use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/country/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }
    public function store(CountryRequest $request)
    {
        $newc = new country();
        $newc->name = $request->name;
        if($newc->save()) {
            return redirect()->back()->with('success', __('Insert a new country success'));

            // return redirect('/admin/countries')->with('success', __('Insert a new country success')); //RouteServiceProvider::HOME
        } else {
            return redirect()->back()->withErrors('Insert country error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function show()//country $country)
    {
        $countries = country::all();
        return view('admin/country/country', compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin/country/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        // $newc = country::where('id_country', $id)->get();
        // $newc->name_country = $request->name_country;
        // $newc->save();
        // return redirect('admin/countries');

        $newc = country::where('id_country', $id);
        $data = $request->except(['_token']);

        if ($newc->update($data)) {
            return redirect()->back()->with('success', __('Update country success.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(country $country, $id)
    {
        $newc = country::where('id_country', $id);
        if($newc) {
            country::where('id_country', $id)->delete();
            return redirect()->back()->with('success', __('Delete country success'));
        }
    }
}
