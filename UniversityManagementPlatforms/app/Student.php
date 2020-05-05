<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function student_attendances()
    {
        return $this->hasMany('App\StudentAttendance');
    }
    
    public function classes()
    {
        return $this->belongsTo('App\Classe');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
