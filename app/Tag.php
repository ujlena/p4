<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function skincares() {
    	return $this->belongsToMany('App\Skincare')->withTimestamps();
    }
}
