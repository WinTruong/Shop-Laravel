<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected $table = 'rates';

    public $fillable = [
    	'blog_id', 'user_id', 'vote',
    ];

    
    // public function averageVote() {
    // 	return $this->hasMany(rate::class, 'blog_id');
    // }

    // public function averageVote() {
    // 	return $this->with('rates')->avg('vote');
    // }
}
