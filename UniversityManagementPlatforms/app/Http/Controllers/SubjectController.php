<?php

namespace App\Http\Controllers;

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

    public function add_subject_review(Request $request, Subject $subject)
    {
        $x = Subject::find($request['id']);
        $x->total_review = $x->total_review + $request->total_review1;
        $x->nbr_review++;
        $x->save();

        return redirect('reviewSubjectt')->with('alert', 'Review Sent successfully!');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
    public function reviews()
    {
        $data = Subject::paginate(10);       
        return view('admin.subjects_reviews',compact('data'));
    }
}
