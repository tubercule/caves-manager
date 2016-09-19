<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public function caves()
    {
    	return $this->hasMany('App\Cave')->withPivot('comment');
    }
}
