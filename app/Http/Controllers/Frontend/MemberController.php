<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Frontend\MemberLoginRequest;
use App\Http\Requests\Frontend\RegisterRequest;
use Validator;

class MemberController extends Controller
{
    public function indexLogin()
    {
        return view('frontend/user/login');
    }

    public function login(MemberLoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            // Xóa dòng này để đăng nhập bằng member/login bằng user level 1 ~ admin 'level' => 0,
        ];
        $remember = true;

        if(Auth::attempt($login, $remember)) {
               return redirect('/');
        } else {
            return redirect()->back()->withErrors('Địa chỉ email hoặc mật khẩu không đúng.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function indexRegister()
    {
        return view('frontend/user/register');
    }

    public function register(RegisterRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $remember = false;
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = new User();

        if($user->create($data) && Auth::attempt($login, $remember)) {
            return redirect('/');
        } else {
            return redirect()->back()->with('error', __('Đã có lỗi xảy ra, xin hãy thử lại'));
        }
    }

    public function accountShowInform()
    {
        return view('frontend/user/account');
    }
}
