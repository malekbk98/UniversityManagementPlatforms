<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
    
    public function departements()
    {
        return $this->belongsTo('App\Departement');
    }
}
