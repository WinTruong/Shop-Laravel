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
        $viewBlog = blog::with('userBlog')->with('rates')->paginate(3);
        // $getBlogListComment = Blog::with('comment')->paginate(config('admin.paginate'));
        // $user = User::where('level', 1)->select('name')->get()->toArray();
        return view('frontend.blog.blog', ['viewBlog' => $viewBlog]);
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
        $comment = new comment();
        $comment->blog_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->id_comment = $request->id_comment;

        if($comment->save()) {
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

    public function show($id)
    {
/* Lấy nội dung bảng comments thông qua liên kết khóa ngoại với bảng blogs
  //  $getBlogListComment = blog::find($id)->comments;
    $getBlogListComment sẽ là 1 array.
*/

    /* Lấy kết quả từ bảng blogs kết hợp với 1 mảng gồm tất cả kết quả từ bảng comments có id=$id 
        Nghĩa là $getBlogListComment sẽ gồm 1 json $getBlogListComment = blog::findOrFail($id) cộng với 1 mảng có n json $getBlogListComment = comment::where('blog_id', $id).
    */
        $getBlogListComment = blog::with(['comments' =>function($q) {
                $q->orderBy('id', 'asc');
        }])->with('rates')->with('userBlog')->findOrFail($id);
        $getBlogListComment->countComment = comment::where('blog_id', $id)->count();
        // $countComments = comment::where('blog_id', $id)->count();
        // dd($getBlogListComment);
/*
cách hiện thị đánh giá của anh Bảo
    $vote = rate::where('blog_id', $id)->get()->toArray();
    $countVote = 0;
    foreach ($vote as $key => $value) {
        $countVote = $countVote + $value['vote'];
    }
    $vote = round($countVote/count($vote));
*/
        $preBlog = blog::where('id', '<', $getBlogListComment->id)->max('id');
        $nextBlog = blog::where('id', '>', $getBlogListComment->id)->min('id');
        // dd($getBlogListComment);
        return view('frontend.blog.blog-details')
                    ->with('getBlogListComment', $getBlogListComment)
                    // ->with('countComments', $countComments)
                    ->with('preBlog', $preBlog)
                    ->with('nextBlog', $nextBlog);
    }

    public function rateAjax(Request $request)
    {   
        $data = $request->all();
        $rate = new rate();
        if(rate::where('blog_id', $data['blog_id'])->where('user_id', $data['user_id'])->exists()) {
            echo 'Bạn đã đánh giá bài viết.';
        } else {
            if($rate->create($data)) {
                echo "Đã đánh giá thành công, xin cảm ơn.";
            } else {
                echo "Đã xảy ra lỗi, hãy tải lại website và thử lại.";
            }
        }
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
