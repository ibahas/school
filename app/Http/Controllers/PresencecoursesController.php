<?php

namespace App\Http\Controllers;

use App\courses;
use App\coursestudents;
use App\presencecourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresencecoursesController extends Controller
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
        $data = presencecourses::orderBy('id', 'DESC')->get();
        return view('control.presencecourses.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $findThisCourse = courses::find($id);
        $thisCourseStudents = coursestudents::where('course_id', $id)->orderBy('id', 'desc')->get();
        return view('control.presencecourses.create', compact('findThisCourse', 'thisCourseStudents'));
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
        // dd($request->all());
        request()->validate([
            'date' => 'required',
        ]);
        $studnetsThisCourse = coursestudents::where('course_id', $request->course_id)->get();
        // dd($request->course_id);
        $studnetsThisCourseCount = coursestudents::where('course_id', $request->course_id)->count();
        for ($i = 0; $i <  $studnetsThisCourseCount; $i++) {
            # code...
            // for loop to get the Inputs ..

            foreach ($request->input('date') as $ii => $value) {

                $data[$ii] = [
                    'date' => $request->date[$ii],
                    'user_id' => Auth::user()->id,
                    'student_id' => $studnetsThisCourse[$i]->id,
                    'status' => 0,
                    'course_id' => $request->course_id,
                ];
                // dd($data);
                presencecourses::create($data[$ii]);
            }
        }
        alert()->success('تم إضافة الأيام لجميع الطلاب بنجاح');
        return redirect('courses/' . $request->course_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\presencecourses  $presencecourses
     * @return \Illuminate\Http\Response
     */
    public function show($idCourses, $idStudent)
    {
        //

    }

    public function showDetailsStudent($idCourses, $idStudent)
    {
        # code...
        $data = presencecourses::where('course_id', $idCourses)->where('student_id', $idStudent)->get();
        $countData = presencecourses::where('course_id', $idCourses)->where('student_id', $idStudent)->count();
        $first = presencecourses::where('course_id', $idCourses)->where('student_id', $idStudent)->first();
        // dd($first);

        if($countData !== 0){
            return view('control.presencecourses.show', compact('data', 'first'));
        }else{
            alert()->warning('لا يوجد أيام عمل لهذا الطالب في هذه الدورة');
            return redirect()->back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\presencecourses  $presencecourses
     * @return \Illuminate\Http\Response
     */
    public function edit(presencecourses $presencecourses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\presencecourses  $presencecourses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, presencecourses $presencecourses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\presencecourses  $presencecourses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $presencecourses = presencecourses::find($id);
        $presencecourses->delete($id);
        alert()->success('تم حذف حضور الدورة');
        return redirect('presencecourses');
    }

    /**
     * Update Presence Studnet in course.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStudentPresence(Request $request)
    {
        //
        foreach ($request->input('id') as $ii => $value) {

            $data = [
                'status' => $request->input('status')[$ii],
            ];
            presencecourses::where('id', $request->input('id')[$ii])->update($data);
        }
        alert()->success('تم تعديل بنجاح');
        return redirect()->back();
    }
}
