<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
