<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function products()
    {
        return $this->hasMany('App\Product');
    }
    
}
