<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comments';

    public $fillable = [
    	'blog_id', 'user_id', 'comment', 'id_comment',
    ];

	public function userComment() {
        return $this->belongsTo('App\Models\User', 'user_id');
	}

    /* Tạo thêm 1 relationship có tên subComments có id_comment = id_comment của 1 hàng dữ liệu*/
    public function subComments()
    {
    	return $this->hasMany(comment::class, 'id_comment')->with('userComment');
    }
    
}
