<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
   public function teacher_attendances()
   {
       return $this->hasMany('App\TeacherAttendance');
   }

   public function subjects()
   {
       return $this->belongsTo('App\Subject');
   }

   public function classes()
   {
       return $this->belongsTo('App\Classe');
   }
}
