<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    //
	protected $table = 'blogs';

	protected $fillable = [
    	'user_id', 'tittle', 'des', 'image', 'content',
    ];
    
    public function userBlog() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

/*khi dd() ra thì ta sẽ được 1 json có 1 relationship tên comments gồm n mảng json nội dung thuộc table comments có blog_id = id của json đàu tiên, mỗi n mảng json này lại có thêm 1 relationship nữa tên subComments gồm m mảng json nội dung thuộc table comments có id_comment = id  n mảng json phân biệt.
nghĩa là 1 json có 1 relationship là n json, từng n json lại có thêm 1 relationship nữa là m json khác.... */
    public function comments() {
        return $this->hasMany('App\Models\comment', 'blog_id')->where('id_comment', 0)->with('userComment')->with('subComments');
    }

    public function rates() {
        return $this->hasMany('App\Models\rate', 'blog_id');
    }


}
