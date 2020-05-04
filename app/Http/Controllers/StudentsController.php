<?php

namespace App\Http\Controllers;

use App\programs;
use App\students;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use SweetAlert;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = students::all();
        return view('control.students.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = students::all();
        $allUsers = User::all();
        $programs = programs::all();
        return view('control.students.create', compact('data', 'allUsers', 'programs'));
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
        request()->validate([
            'name' => 'required|min:3',
            'bod' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'wallet_id' => 'required',
            'pearint_id' => 'required',
            'photo'  => 'mimes:jpg,jpeg,png,gif|max:2048',
            'program_id' => 'required'

        ]);

        if ($request->hasFile('photo')) {
            $files = $request->file('photo');
            $destinationPath = public_path("/image/students/");
            $imgfile = time() . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            $imgfile = null;
        }

        $data = [
            'name' => $request->name,
            'bod' => $request->bod,
            'phone' => $request->phone,
            'address' => $request->address,
            'wallet_id' => $request->wallet_id,
            'pearint_id' => $request->pearint_id,
            'user_id' => Auth::user()->id,
            'photo' => $imgfile,
            'program_id' => $request->program_id,
            'rating' => '0',
        ];
        students::create($data);
        alert()->success('تم إضافة الطالب' . $request->name .   ' بنجاح .');
        return redirect('students');
    }

    /**
     *
     * Display the specified resource.
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = students::find($id);
        return view('control.students.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = students::find($id);
        $allUsers = User::all();
        $programs = programs::all();
        return view('control.students.edit', compact('data', 'allUsers', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'name' => 'required|min:3',
            'bod' => 'required',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'wallet_id' => 'required',
            'pearint_id' => 'required',
            'photo'  => 'mimes:jpg,jpeg,png,gif|max:2048',
            'program_id' => 'required'

        ]);

        if ($request->hasFile('photo')) {
            $files = $request->file('photo');
            $destinationPath = public_path("/image/students/");
            $imgfile = time() . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imgfile);
        } else {
            $imgfile = null;
        }
        $data = [
            'name' => $request->name,
            'bod' => $request->bod,
            'phone' => $request->phone,
            'address' => $request->address,
            'wallet_id' => $request->wallet_id,
            'pearint_id' => $request->pearint_id,
            'photo' => $imgfile,
            'program_id' => $request->program_id,
            'rating' => $request->rating,
        ];
        // dd($data);
        students::where('id', $id)->update($data);
        alert()->success('تم تعديل بيانات الطالب بنجاح .');
        return redirect('students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $studnet = students::find($id);
        $studnet->delete($id);
        return redirect('studnets');
    }
}
