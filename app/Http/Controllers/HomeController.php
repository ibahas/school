<?php

namespace App\Http\Controllers;

use App\courses;
use App\coursetesting;
use App\programs;
use App\students;
use App\studentsParents;
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
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            //Students
            $takeStudents = 5;
            $students = students::orderBy('id', 'DESC')->take($takeStudents)->get();
            //Program
            $takeProgram = 5;
            $programs = programs::orderBy('id', 'DESC')->take($takeProgram)->get();
            //Courses
            $takeCourses = 5;
            $courses = courses::orderBy('id', 'DESC')->take($takeCourses)->get();
            //ReportStudents
            $takeReportStudents = 5;
            $reportStudents = studentsParents::orderBy('id', 'DESC')->take($takeReportStudents)->get();
            //coursetestings
            // $coursetesting = coursetesting::all();
            // dd($coursetesting);
            
            return view('home', compact('students', 'programs', 'courses', 'reportStudents'));
        }
        if (Auth::user()->role == 3) {
            //teacherStudents
            $takeTeacherStudents = 5;
            $teacherStudents = students::where('wallet_id', Auth::user()->id)->orderBy('id', 'DESC')->take($takeTeacherStudents)->get();
            return view('home', compact('teacherStudents'));
        }
        if (Auth::user()->role == 4) {
            //myChildren
            $myChildren = students::where('pearint_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            $reportChildren = studentsParents::where('parent', Auth::user()->id)->orderBy('id', 'DESC')->get();
            return view('home', compact('myChildren','reportChildren'));
        }
        return view('home');
    }
}
