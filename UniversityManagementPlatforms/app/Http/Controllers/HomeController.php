<?php

namespace App\Http\Controllers;
use App\Department;
use App\Classe;
use App\User;
use App\Subject;
use App\Student;
use App\Teacher;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(auth::user()->position=='admin'){
            $stat['subject'] = count(Subject::all());
            $stat['classe'] = count(Classe::all());
            $stat['department'] = count(Department::all());
            $stat['student'] = count(Student::all());
            $stat['teacher'] = count(Teacher::all());
            $stat['admin'] = count(User::where('position','=','admin')->get());

            return view('admin.dashboard',compact('stat'));
        }
        elseif(auth::user()->position=='teacher'){

            $classatt =auth::user()->teachers()
            ->join ('subjects','teacher_id','=','teachers.id')
            ->join('lessons', 'subject_id', '=', 'subjects.id')
            ->join('classes', 'classes.id', '=', 'lessons.classe_id')->distinct('classes.classe_name')->get();
            $student_nbr=0;
            foreach($classatt as $class){
                $classroom =Student::where('classe_id','=',$class->id)
                ->join('users','users.id','=','students.user_id')
                ->get();
                foreach($classroom as $students){
                    $student_nbr++;
                }
            }
            $stat['classe'] = count($classatt);
            $stat['student'] = $student_nbr;
            return view('teacher_attendance.dashboard',compact('stat'));
        }
        elseif(auth::user()->position=='student'){

            return view('student_attendance.dashboard');
        }
    }
}
