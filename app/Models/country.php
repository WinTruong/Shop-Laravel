<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
	protected $table = 'countries';
    //
    protected $fillable = [
    	'name_country', 'id_country',
    ];
}
