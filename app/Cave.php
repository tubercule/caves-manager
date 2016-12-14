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

    public function periods()
    {
    	return $this->belongsToMany('App\Period')->withPivot('comment');
    }

    public function getLattitudeAsString()
    {
        $label = $this->lattitude_deg . '° ';
        $label .= $this->lattitude_min . "' ";
        $label .= $this->lattitude_sec . '" ';
        $label .= '(' . $this->lattitude_hem . ')';
        return $label;
    }

        public function getLongitudeAsString()
    {
        $label = $this->longitude_deg . '° ';
        $label .= $this->longitude_min . "' ";
        $label .= $this->longitude_sec . '" ';
        $label .= '(' . $this->longitude_hem . ')';
        return $label;
    }
}
