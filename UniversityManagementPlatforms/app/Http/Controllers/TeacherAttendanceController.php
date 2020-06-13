<?php

namespace App\Http\Controllers;

use App\TeacherAttendance;
use App\Teacher;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TeacherAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacheratt =auth::user()->teachers()
        ->join ('teacher_attendances','teacher_id','=','teachers.id')
        ->join('lessons', 'lessons.id', '=', 'teacher_attendances.lesson_id')
        ->join('subjects', 'subjects.id', '=', 'lessons.subject_id')->get();
    return view ('teacher_attendance.index',compact ('teacheratt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher_attendance.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id= Auth::id();
        $teacher_id= Teacher::where('user_id', '=', $user_id)->pluck('id');
        $teacher_attendance = new TeacherAttendance;
        $teacher_attendance ->teacher_id=$request->teacher_id = $teacher_id[0];
        $teacher_attendance ->lesson_id=$request->lesson_id;
        $teacher_attendance ->check_in=$request->check_in =now();
        $teacher_attendance ->status=$request->status;
        $teacher_attendance -> save();
        return redirect()->route('teacher_attendance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeacherAttendance  $teacherAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherAttendance $teacherAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeacherAttendance  $teacherAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherAttendance $teacherAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeacherAttendance  $teacherAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherAttendance $teacherAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeacherAttendance  $teacherAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherAttendance $teacherAttendance)
    {
        //
    }
}
