<?php

namespace App\Http\Controllers;

use App\dateworkprograms;
use App\programs;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DateworkprogramsController extends Controller
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
        $data = dateworkprograms::orderBy('id', 'DESC')->get();
        return view('control.dateworkprograms.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $program = programs::find($id);
        // dd($program);
        return view('control.dateworkprograms.create', compact('program'));
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
        // dd(students::where('program_id',$request->thisProgram)->get());
        $studnetsThisProgram = students::where('program_id', $request->thisProgram)->get();

        $studnetsThisProgramCount = students::where('program_id', $request->thisProgram)->count();
        // dd($request->input('to'));
        // exit;
        for ($i = 0 ; $i <  $studnetsThisProgramCount ; $i++) {
            # code...
            // for loop to get the Inputs ..
         
            foreach ($request->input('date') as $ii => $value) {

                $data = [
                    'date' => $request->input('date')[$ii],
                    'user_id' => Auth::user()->id,
                    'student_id' => $studnetsThisProgram[$i]->id,
                    'program_id' => $request->thisProgram,
                    'from' => $request->input('from')[$ii],
                    'to' => $request->input('to')[$ii],
                    'evaluation' => 0,
                    'status' => 0,
                ];
                // dd($data);
                dateworkprograms::create($data);
            }
        }
        alert()->success('تم إضافة أيام عمل البرنامج بنجاح');
        return redirect('program/' . $request->thisProgram);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dateworkprograms  $dateworkprograms
     * @return \Illuminate\Http\Response
     */
    public function show(dateworkprograms $dateworkprograms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dateworkprograms  $dateworkprograms
     * @return \Illuminate\Http\Response
     */
    public function edit(dateworkprograms $dateworkprograms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dateworkprograms  $dateworkprograms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dateworkprograms $dateworkprograms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dateworkprograms  $dateworkprograms
     * @return \Illuminate\Http\Response
     */
    public function destroy(dateworkprograms $dateworkprograms)
    {
        //
    }
    //show all Day Work From Program .
    public function programWithStudent($idProgram,$idStudent)
    {
        //
        $data = dateworkprograms::where('student_id',$idStudent)->where('program_id',$idProgram)->get();
        return view('control.dateworkprograms.showByStudentAndProgram',compact('data','idProgram','idStudent'));
    }

    public function updateAll(Request $request)
    {
        //
        foreach ($request->input('id') as $ii => $value) {

            $data = [
                'evaluation' => $request->input('evaluation')[$ii],
            ];
            dateworkprograms::where('id', $request->input('id')[$ii])->update($data);
        }
        alert()->success('تم تعديل التقيم بنجاح');
        return redirect()->back();
    }

}
