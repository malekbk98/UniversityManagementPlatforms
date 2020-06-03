<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $guarded = [];
    
    public function student()
    {
        return $this->hasMany('App\Student');
    }

    public function lesson()
    {
        return $this->hasMany('App\Lesson');
    }
    
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
