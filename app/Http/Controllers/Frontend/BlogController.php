<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\User;
use App\Models\comment;
use App\Models\rate;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\CommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewblog = blog::paginate(3);
        // $getBlogListComment = Blog::with('comment')->paginate(config('admin.paginate'));
        // $user = User::where('level', 1)->select('name')->get()->toArray();
        $user = User::where('level', 1)->pluck('name');
        return view('frontend.blog.blog', ['viewblog' => $viewblog], ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Htt\\p\Response
     */
    public function view($id)
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(CommentRequest $request, $id)
    {
        $cm = new comment();

        // cách 1
        $cm->blog_id = $id;
        $cm->user_id = Auth::user()->id;
        $cm->user_name = Auth::user()->name;
        $cm->avatar = Auth::user()->avatar;
        $cm->comment = $request->comment;
        $cm->id_comment = $request->id_comment;

        // cách 2
        $data = $request->all();
        $data['blog_id'] = $id;
        $data['user_id'] = Auth::user()->id;
        $data['user_name'] = Auth::user()->name;
        $data['avatar'] = Auth::user()->avatar;

        if($cm->save($data)) {
            return redirect()->back()->with('success', __('aa'));
        } else {
            return redirect()->back()->withErrors('Có lỗi, xin thử lại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */

    // public function getRate($id)
    // {
    //     $rates = rate::where('')
    //     $averageRate = 
    // }
    public function show($id)
    {
        // $blog = blog::findOrFail($id);
        
        /*$viewcomment = comment::where('blog_id', $id)->get();

        foreach ($viewcomment as $comments) {
            echo $comments->comment;
        }
/*Lấy nội dung bảng comments thông qua liên kết khóa ngoại với bảng blogs
  //  $getBlogListComment = blog::find($id)->comments;
    $getBlogListComment sẽ là 1 array.
*/

    /*Lấy kết quả từ bảng blogs kết hợp với 1 mảng gồm tất cả kết quả từ bảng comments  có id=$id 
        Nghĩa là $getBlogListComment sẽ gồm 1 json $getBlogListComment = blog::findOrFail($id) cộng với 1 mảng có n json $getBlogListComment = comment::where('blog_id', $id).
    */
        // $getBlogListComment = blog::with(['comments' => function ($q) {
        //         $q->orderBy('id', 'desc');
        //     }])->find($id);
        // }

        // $viewcomment = DB::table('comments')->where('blog_id', $id)->get();
        $getBlogListComment = blog::with(['comments' =>function($q) {
                $q->orderBy('id', 'asc');
        }])->findOrFail($id);
        $count = comment::where('blog_id', $id)->count();
        // $getComments = comment::with('subComments')->where('blog_id', $id)->where('id_comment', 0)->get();
        $vote = rate::where('blog_id', $id)->get();
        // dd($vote);

/*
    cách hiện thị đánh giá của anh Bảo
        $vote = rate::where('blog_id', $id)->get()->toArray();
        $countVote = 0;
        foreach ($vote as $key => $value) {
            $countVote = $countVote + $value['vote'];
        }
        $vote = round($countVote/count($vote));
*/
        $user = User::where('level', 1)->pluck('name');

        // 2 cách lấy id để làm nút previous và next cho trang blog-details
       /* cách 1 lấy ra column id trong table blog tạo thành 1 array
        $viewblog = blog::pluck('id')->toArray();
        */
        // cách 2 tạo 2 biến pre = id nhỏ nhất next = id lớn nhất thuộc column id trong table blog, cách 2 nhanh gọn hơn.
        $pre = blog::where('id', '<', $getBlogListComment->id)->max('id');
        $next = blog::where('id', '>', $getBlogListComment->id)->min('id');

        // $users = Auth::user()->avatar;
        return view('frontend.blog.blog-details')
                    // ->with('viewblog', $viewblog)
                    ->with('getBlogListComment', $getBlogListComment)
                    ->with('count', $count)
                    ->with('vote', $vote)
                    ->with('pre', $pre)
                    ->with('next', $next)
                    ->with('user', $user);
                    // ->with('viewcomment', $viewcomment);
    }

    public function rateAjax(Request $request)
    {   
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        $rate = new rate();

        if($rate->create($data)) {
            echo "Đã đánh giá thành công, xin cảm ơn.";
        } else {

        }

        // $deleteblog = blog::findOrFail($id);
        // if($deleteblog) {
        //     blog::where('id',$id)->delete();
        //     return redirect()->back()->with('success',__('Đã xóa blog thành công'));
        // }
        // if(create) {
        //     echo "ok";
        // }
        // else {
        //     echo "loi";
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        //
    }
}
