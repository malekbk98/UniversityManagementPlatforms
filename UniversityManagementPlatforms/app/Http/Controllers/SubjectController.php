<?php

namespace App\Http\Controllers;
use App\Teacher;
use App\User;
use App\Subject;
use App\Student;
use App\Lesson;
use App\Classe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject_review =auth::user()->students()
        ->join ('classes','classes.id','=','classe_id')
        ->join('lessons', 'lessons.classe_id', '=', 'classes.id')
        ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')->get();

        return view('review.review',compact('subject_review'));

    }
    public function home()
    {   
        $subjects = Subject::with('teachers')->latest()->paginate(10);

        return view('admin.subjects_index', compact('subjects'));
    }


    public function add_subject_review(Request $request, Subject $subject)
    {
        $x = Subject::find($request['id']);
        $x->total_review = $x->total_review + $request->total_review1;
        $x->nbr_review++;
        $x->save();

        return redirect('reviewSubjectt');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('admin.subjects_create',compact('teachers'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =request()->validate([
            'subject_name' => 'required',
            'teacher_id' => 'required',
            'subject_cof' => 'required',
            'subject_max_abs' => 'required',
            'subject_type' => 'required',
            'total_review' => 'required',
            'nbr_review' => 'required'
        ]);
        
        Subject::create($data);
        return redirect(route('subjects_index.home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($subject)
    {
        $subject = Subject::where('id', $subject)->firstOrFail();
        $teachers = Teacher::all();
        return view('admin.subjects_edit', compact('subject','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject)
    {
        $subject = Subject::where('id', $subject)->firstOrFail();
        $data =request()->validate([
            'subject_name' => 'required',
            'teacher_id' => 'required',
            'subject_cof' => 'required',
            'subject_max_abs' => 'required',
            'subject_type' => 'required',
            'total_review' => 'required',
            'nbr_review' => 'required'
        ]);
        $subject->update($data);
        return redirect()->route('subjects_index.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        Subject::destroy($subject->id);

        return redirect()->route('subjects_index.home');
    }
    public function reviews()
    {
        $data = Subject::paginate(10);       
        return view('admin.subjects_reviews',compact('data'));
    }
}
