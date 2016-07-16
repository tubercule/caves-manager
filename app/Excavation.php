<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excavation extends Model
{
	public function cave()
    {
    	return $this->belongsTo('App\Cave');
    }
}
