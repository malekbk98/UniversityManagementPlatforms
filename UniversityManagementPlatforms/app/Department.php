<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];
    
    public function classes()
    {
        return $this->hasMany('App\Classe');
    }
}
