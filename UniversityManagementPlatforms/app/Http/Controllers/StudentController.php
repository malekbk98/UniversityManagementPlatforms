<?php

namespace App\Http\Controllers;

use App\Student;
use App\Classe;
use App\User;
use App\Department;
use DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('user')->latest()->paginate(10);

        return view('admin.students_manages', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $classes = Classe::all();
       
        return view('admin.students_create',compact('users','classes'));
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
            'classe_id' => 'required',
            'total_review' => 'required',
            'nbr_review' => 'required'
        ]);
        
        Student::create($data);
        return redirect(route('students.index'));    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $data=$student;
        return view('admin.report',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($student)
    {
        $student = Student::where('id', $student)->firstOrFail();
        $users = User::all();
        $classes = Classe::all();

        return view('admin.students_edit', compact('student','users','classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student)
    {
        $student = Student::where('id', $student)->firstOrFail();
        $data =request()->validate([
            'user_id' => 'required',
            'classe_id' => 'required',
            'total_review' => 'required',
            'nbr_review' => 'required'
        ]);
        $student->update($data);
        return redirect('students/'. $student->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //Student::destroy($student->id);
        Student::with('studentAttendance','user')->delete();
        return redirect('/students');
    }
    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index');
    }
    public function reviews()
    {
        $data = Student::with('user')->get();       
        return view('admin.students_reviews',compact('data'));
    }
    public function lists()
    {
        $data = DB::table('students')
        ->join('users','users.id','=','students.user_id')
        ->join('classes','classes.id','=','students.classe_id')
        ->join('departments','departments.id','=','classes.department_id')
        ->get();
        $cls=Classe::select('classe_name','specialite')->get();
        $dep=Department::select('department_name')->get();
        return view('admin.student_lists',compact('data','cls','dep'));
    }

}
