<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use App\Subject;
use App\Student;
use App\Lesson;
use App\Classe;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $teacher_review =auth::user()->students()
            ->join ('classes','classes.id','=','classe_id')
            ->join('lessons', 'lessons.classe_id', '=', 'classes.id')
            ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')
            ->join('teachers', 'teachers.id','=', 'subjects.teacher_id')->with('user')->get();
    
            return view('review.review_teacher',compact('teacher_review'));
    }
    public function home()
    {
        $teachers = Teacher::with('user')->latest()->paginate(10);

        return view('admin.teachers_index', compact('teachers'));
    }

    public function add_teacher_review(Request $request, Teacher $Teacher)
    {
        $x = Teacher::find($request['id']);
        $x->total_review = $x->total_review + $request->total_review1;
        $x->nbr_review++;
        $x->save();

        return redirect('reviewTeacher');
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Teacher::with('user')->get();
        return view('admin.teachers_create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =request()->validate([
            'user_id' => 'required',
            'salary' => 'required',
            'start_date' => 'required',
            'position' => 'required',
            'total_review' => 'required',
            'nbr_review' => 'required'
        ]);
        
        Teacher::create($data);
        return redirect(route('teachers_index.home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        

        $data=$teacher;
        return view('admin.report',compact('data'));

    }
    public function view( $teach)
    {
        $teach = Teacher::where('id', $teach)->firstOrFail();
        return view('admin.teachers_show', compact('teach'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($teacher)
    {
        $teacher = Teacher::where('id', $teacher)->firstOrFail();
        $users = Teacher::with('user')->get();

        return view('admin.teachers_edit', compact('teacher','users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$teacher)
    {
        $teacher = Teacher::where('id', $teacher)->firstOrFail();
        $data =request()->validate([
            'salary' => 'required',
            'start_date' => 'required',
            'position' => 'required',
            'total_review' => 'required',
            'nbr_review' => 'required'
        ]);
        $teacher->update($data);
        return redirect('teachers/'. $teacher->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        Teacher::destroy($teacher->id);

        return redirect()->route('teachers_index.home');
    }
    public function reviews()
    {
        $data = Teacher::with('user')->get();       
        return view('admin.teachers_reviews',compact('data'));
    }
    public function lists()
    {
        $data = DB::table('teachers')
        ->join('users','users.id','=','teachers.user_id')
        ->join('subjects','subjects.teacher_id','=','teachers.id')
        ->select('teachers.position','teachers.user_id','users.first_name','users.last_name','users.email','users.phone','subjects.subject_name','subjects.subject_type')
        ->get();
        $sub=Subject::select('subject_name','subject_type')->get();
        $pos=Teacher::select('position')->get();
        return view('admin.teacher_lists',compact('data','sub','pos'));
    }
    
}
