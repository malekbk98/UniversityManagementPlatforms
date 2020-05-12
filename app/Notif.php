<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
