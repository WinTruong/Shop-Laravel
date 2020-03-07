<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\BlogRequest;

class BlogController extends Controller
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
        $viewblog = blog::paginate(3);
        // dd($viewblog);
        return view('admin/blog/blog', compact('viewblog'));
        // Hoặc dùng cách này --- return view('admin/blog/blog')->with('viewblog', $viewblog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blog/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $blog = new blog();
        $data = $request->all();
        $file = $request->image;
        $data['content'] = trim($data['content']);
        $data['des'] = trim($data['des']);
        if(!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }

        if($blog->create($data)) {
            if(!empty($file)) {
                $file->move('admin/assets/images/blogs', $data['image']);
            } else {
                return redirect()->back()->withErrors('Đã xảy ra lỗi khi di chuyển file ảnh');
            }
            return redirect()->back()->with('success', __('Đã tạo mới một blog'));
        } else {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi tạo mới blog');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editblog = blog::findOrFail($id)->toArray();
        return view('admin/blog/edit', compact('editblog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $editblog = blog::findOrFail($id);
        $data = $request->all();
        $file = $request->image;
        $data['content'] = trim($data['content']);
        $data['des'] = trim($data['des']);
        if(!empty($file)) {
            $data['image'] = $file->getClientOriginalName();
        }

        if($editblog->update($data)) {
            if(!empty($file)) {
                $file->move('admin/assets/images/blogs', $data['image']);
            } else {
                return redirect()->back()->withErrors('Đã xảy ra lỗi khi di chuyển file ảnh');
            }
            return redirect()->back()->with('success', __('Đã cập nhập blog hoàn tất'));
        } else {
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi cập nhập blog');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog, $id)
    {
        $deleteblog = blog::findOrFail($id);
        if($deleteblog) {
            blog::where('id',$id)->delete();
            return redirect()->back()->with('success',__('Đã xóa blog thành công'));
        }
    }
}
