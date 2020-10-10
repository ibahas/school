<?php

namespace App\Http\Controllers;

use App\courses;
use App\coursestudents;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursestudentsController extends Controller
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
        $data = coursestudents::orderBy('id', 'DESC')->get();
        return view('control.coursestudents.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $findCourse = courses::find($id);
        $studnets = students::all();
        $thisCourseStudents = coursestudents::where('course_id',$id)->orderBy('id','desc')->get();
        return view('control.Coursestudents.create', compact('findCourse', 'studnets', 'thisCourseStudents'));
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
        foreach ($request->input('student_id') as $ii => $value) {

            $data = [
                'course_id' =>  $request->course,
                'student_id' => $request->input('student_id')[$ii],
                'evaluation' =>  0,
                'user_id' => Auth::user()->id,
                'status' => 0,
            ];
            $ifThisStudentExsist = coursestudents::where('course_id',$request->course)->where('student_id',$request->input('student_id')[$ii])->count();
            if($ifThisStudentExsist !== 0){
            }else{
                coursestudents::create($data);
            }
        }
        alert()->success('تم إضافة الطالب بنجاح');
        return redirect('courses/' . $request->course);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\coursestudents  $coursestudents
     * @return \Illuminate\Http\Response
     */
    public function show(coursestudents $coursestudents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coursestudents  $coursestudents
     * @return \Illuminate\Http\Response
     */
    public function edit(coursestudents $coursestudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coursestudents  $coursestudents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coursestudents $coursestudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coursestudents  $coursestudents
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd(request()->headers->get('referer'));
        // $findThisStudentInThisCourse = coursestudents::where('student_id',$id)->delete();

    }
    public function updateAllRows(Request $request)
    {
        //
        foreach ($request->input('ids') as $ii => $value) {

            $data = [
                'status' => $request->input('status')[$ii],
            ];
            coursestudents::where('id', $request->input('ids')[$ii])->update($data);
        }
        alert()->success('تم تعديل  بنجاح');
        return redirect()->back();
    }
}
