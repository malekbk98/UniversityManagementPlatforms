<?php

namespace App\Http\Controllers;
use App\Student;
use App\User;
use App\StudentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentatt =auth::user()->students()->join ('student_attendances','student_id','=','students.id')->join('lessons', 'lessons.id', '=', 'student_attendances.lesson_id')->join('subjects', 'subjects.id', '=', 'lessons.subject_id')->get();
    return view ('student_attendance.index',compact ('studentatt'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student_attendance.add');
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
        $student_id= Student::where('user_id', '=', $stid)->pluck('id');
      //  $request->validate([
           // 'check_in' => 'required',
         //   'status'=> 'required'
     //   ]);
        $student_attendance = new StudentAttendance;
        $student_attendance ->student_id = $student_id[1];
        $student_attendance ->lesson_id = 17;
        $student_attendance ->check_in = now() ;
        $student_attendance =$request->status;
        $student_attendance -> save();
        return redirect()->route('student_attendance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentAttendance $studentAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentAttendance  $studentAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentAttendance $studentAttendance)
    {
        //
    }
}
