<?php

namespace App\Http\Controllers;

use App\programs;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = programs::all();
        return view('control.programs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = programs::all();
        return view('control.programs.create', compact('data'));
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
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 1,
        ];
        programs::create($data);
        return redirect('programs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = programs::find($id);
        $students = students::where('program_id', $id)->get();
        return view('control.programs.show', compact('data', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = programs::find($id);
        return view('control.programs.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => 1,
        ];
        programs::where('id', $id)->update($data);
        alert()->success('تم تحديث البرنامج بنجاح');
        return redirect('programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\programs  $programs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $programs = programs::find($id);
        $programs->delete($id);
        alert()->warning('تم حذف البرنامج بنجاح');
        return redirect('programs');
    }
}
