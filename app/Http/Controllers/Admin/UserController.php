<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\country;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdateUserRequest;

class UserController extends Controller
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
    public function index()
    {
        $getAllCountry = country::all()->toArray();
        $getInformProfile = Auth::user()->toArray();
        return view('admin/user/pages-profile', compact('getAllCountry','getInformProfile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $memberL = User::all();
        return view('admin/user/member-list')->with('memberL', $memberL);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        $id = Auth::id();
        $updateUser = User::findOrFail($id);
        $data = $request->all();
        $file = $request->avatar;

        if(is_null($data['password'])) {
            $data['password'] = $updateUser->password;
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        if(!empty($file)) {
            $data['avatar'] = $file->getClientOriginalName();
        }
// dd($data);
        if($updateUser->update($data)) {
            if(!empty($file)) {
                $file->move('admin/assets/images/users', $file->getClientOriginalName());
            }
            return redirect()->back()->with('success', __('Update profile success.'));
        } else {
            return redirect()->back()->withErrors('Update profile error.');
        }
        // return view('admin/error-404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);
        if($deleteUser) {
            User::where('id', $id)->delete();
            return redirect()->back()->with('success', __('Đã xóa người dùng thành công'));
        } else {
            return redirect()->back()->withErrors('Có lỗi xảy ra, xin hãy thử lại');
        }
    }
}
