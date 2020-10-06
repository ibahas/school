<?php

namespace App\Http\Controllers;

use App\courses;
use App\coursestudents;
use App\coursetesting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursetestingController extends Controller
{
    /**
     * This construct start in initialize this controller
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = coursetesting::orderBy('id', 'DESC')->get();
        return view('control.coursetesting.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $course = courses::find($id);
        // dd($course);
        $coursestudents = coursestudents::where('course_id',$id)->get();
        // dd($coursestudents);
        return view('control.coursetesting.create', compact('course','coursestudents'));
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
        foreach ($request->input('rating') as $ii => $value) {

            $data = [
                'course_id' => $request->course_id,
                'rating' => $request->input('rating')[$ii],
                'student_id' => $request->input('student_id')[$ii],
                'status' => 1,
                'user_id' => Auth::user()->id,
            ];
            coursetesting::create($data);
        }
        alert()->success('تم إضافة علامة الدورة  بنجاح للطلاب');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coursetesting  $coursetesting
     * @return \Illuminate\Http\Response
     */
    public function show(coursetesting $coursetesting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coursetesting  $coursetesting
     * @return \Illuminate\Http\Response
     */
    public function edit(coursetesting $coursetesting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coursetesting  $coursetesting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coursetesting $coursetesting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coursetesting  $coursetesting
     * @return \Illuminate\Http\Response
     */
    public function destroy(coursetesting $coursetesting)
    {
        //
    }
}
