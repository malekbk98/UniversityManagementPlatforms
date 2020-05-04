<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    public function lessons()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function teachers()
    {
        return $this->belongsTo('App\Teacher');
    }
}
