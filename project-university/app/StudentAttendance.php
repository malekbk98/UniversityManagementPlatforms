<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    public function lessons()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function students()
    {
        return $this->belongsTo('App\Student');
    }
}
