<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';

    public $fillable = [
    	'blog_id', 'user_id', 'avatar', 'comment', 'id_comment',
    ];

    // public function blog()
    // {
    // 	return $this->belongsTo('App\Models\blog', 'blog_id');
    // }
    /* Tạo thêm 1 relationship có tên subComments có id_comment = với id_comment của 1 hàng dữ liệu*/
    public function subComments()
    {
    	return $this->hasMany(comment::class, 'id_comment');
    }
    // public function subComments()
    // {
    // 	return $this->hasMany(comment::class, 'id_comment')->with('comments');
    // }
}
