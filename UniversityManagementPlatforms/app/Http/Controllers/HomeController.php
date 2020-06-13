<?php

namespace App\Http\Controllers;
use App\Department;
use App\Classe;
use App\User;
use App\Subject;

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
            $stat['student'] = count(User::where('position','=','student')->get());
            $stat['teacher'] = count(User::where('position','=','teacher')->get());


            return view('admin.dashboard',compact('stat'));
        }
        else{
            return view('home');
        }
    }
}
