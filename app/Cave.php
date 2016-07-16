<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cave extends Model
{

    public function biblios()
    {
    	return $this->belongsToMany('App\Biblio', 'cave_biblio')->withPivot('comment');
    }

    public function excavations()
    {
    	return $this->hasMany('App\Excavation');
    }
}
