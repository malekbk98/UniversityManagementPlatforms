<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Department;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::with('department')->latest()->paginate(10);

        return view('admin.classes_index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Department::all();
        return view('admin.classes_create',compact('departements'));
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
            'classe_name' => 'required',
            'department_id' => 'required',
            'specialite' => 'required',
        ]);
        
        Classe::create($data);
        return redirect(route('classes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show($classe)
    {
        $classe = Classe::where('id', $classe)->firstOrFail();
        return view('admin.classes_show', compact('classe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit($class)
    {
        $class = Classe::where('id', $class)->firstOrFail();
        $department = Department::all();
        return view('admin.classes_edit', compact('class','department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update($classe,Request $request)
    {
        $classe = Classe::where('id', $classe)->firstOrFail();
        $data =request()->validate([
            'classe_name' => 'required',
            'department_id' => 'required',
            'specialite' => 'required',
        ]);
        $classe->update($data);
        return redirect()->route('classes.show', $classe->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classe = Classe::find($id);
        $classe->delete();

        return redirect()->route('classes.index');
    }
}
