<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];

   public function teacher_attendance()
   {
       return $this->hasMany('App\TeacherAttendance');
   }

   public function subject()
   {
       return $this->belongsTo('App\Subject');
   }

   public function classe()
   {
       return $this->belongsTo('App\Classe');
   }
}
