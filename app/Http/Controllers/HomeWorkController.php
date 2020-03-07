<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\InputRequest;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class HomeWorkController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function test1() {
        return view('testlogin');
    	
    }
    
    public function handleForm(InputRequest $request) {
        exit;
    }
    
    public function testPost() {
        echo 1;
    }


    
 // public function handleForm(Request $request) {
    //     $validate = Validator::make(
    //         $request->all(),
    //         [
    //             'username' => 'required|min:5|max:255',
    //             'age' => 'required|integer|max:120',
    //         ],
    //         [
    //             'required' => ':attribute không được để trống',
    //             'min' => ':attribute không được nhỏ hơn :min',
    //             'max' => ':attribute không được lớn hơn :max',
    //             'integer' => ':attribute chỉ được nhập số',
    //         ],
    //         [
    //             'username' => 'Tiêu đề',
    //             'age' => 'Tuổi',
    //         ]
    //     );

    //     if($validate->fails()) {
    //         return redirect('form')->withErrors($validate)->withInput();
    //     }
    //     \App\Form::create([
    //         'username' = $request->username,
    //         'age' = $request->age
    //     ]);
    //     return response()->json('Form is successfully validated and data has been saved');
    // }


}
