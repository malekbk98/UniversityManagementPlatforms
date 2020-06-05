<?php

namespace App\Http\Controllers;
use App\Classe;
use App\Teacher;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Lesson;
use App\Subject;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $teacher_schedule =auth::user()->teachers()
        ->join ('subjects','teacher_id','=','teachers.id')
        ->join('lessons', 'lessons.subject_id', '=', 'subjects.id')->get();
   //dd($teacher_schedule);
        return view ('classe.schedule',compact ('teacher_schedule'));
    }
    public function home()
    {
        $lesson = Lesson::with('classe','subject')->latest()->paginate(10);

        return view('admin.schedule_index', compact('lesson'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = Classe::all();
        $subject = Subject::all();
        return view('admin.schedule_create',compact('class','subject'));
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
            'subject_id' => 'required',
            'classe_id' => 'required',
            'classroom' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'week_day' => 'required'
        ]);
        
        Lesson::create($data);
        return redirect('/schedule_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($lesson)
    {
        $lesson = Lesson::where('id', $lesson)->firstOrFail();
        $class = Classe::all();
        $subject = Subject::all();
        return view('admin.schedule_edit', compact('lesson','subject','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lesson)
    {
        $lesson = Lesson::where('id', $lesson)->firstOrFail();
        $data =request()->validate([
            'subject_id' => 'required',
            'classe_id' => 'required',
            'classroom' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'week_day' => 'required'
        ]);
        $lesson->update($data);
        return redirect('/schedule_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();

        return redirect('/schedule_index');
    }
}
