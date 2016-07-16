<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biblio extends Model
{
    //
    public function caves() 
    {
    	return $this->belongsToMany('App\Cave', 'cave_biblio');
    }
    
}
