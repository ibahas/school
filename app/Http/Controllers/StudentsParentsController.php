<?php

namespace App\Http\Controllers;

use App\studentsParents;
use App\students;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = studentsParents::all();
        return view('control.studentsParents.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $findStudent = students::find($id);
        return view('control.studentsParents.create', compact('findStudent'));

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
        $findStudent = students::find($request->student);
        $thisParent = User::where('id',$findStudent->pearint_id)->first();

        $data = [
            'student' => $request->student,
            'titleReport' => $request->titleReport,
            'detailsReport' => $request->detailsReport,
            'parent' => $thisParent->id,
            'byUser' => Auth::user()->id,
        ];
        // dd($data);
        studentsParents::create($data);
        alert()->success('تم إضافة البلاغ بنجاح');
        return redirect('studentsParents');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\studentsParents  $studentsParents
     * @return \Illuminate\Http\Response
     */
    public function show(studentsParents $studentsParents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\studentsParents  $studentsParents
     * @return \Illuminate\Http\Response
     */
    public function edit(studentsParents $studentsParents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\studentsParents  $studentsParents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentsParents $studentsParents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\studentsParents  $studentsParents
     * @return \Illuminate\Http\Response
     */
    public function destroy(studentsParents $studentsParents)
    {
        //
    }
}
