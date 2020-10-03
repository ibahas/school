<?php

namespace App\Http\Controllers;

use App\logStudents;
use App\programs;
use App\students;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsController extends Controller
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
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {

            $data = students::orderBy('id', 'DESC')->get();
            return view('control.students.index', compact('data'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {

            $data = students::all();
            $allUsers = User::all();
            $programs = programs::all();
            return view('control.students.create', compact('data', 'allUsers', 'programs'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
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
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            request()->validate([
                'name' => 'required|min:3|unique:students',
                'bod' => 'required',
                'phone' => 'required|min:10|max:10',
                'address' => 'required',
                'wallet_id' => 'required',
                'pearint_id' => 'required',
                'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                'program_id' => 'required',

            ]);
                //Add Image If exist
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
            $lastSTD = students::orderBy('id', 'DESC')->first();

            $data1 = [
                'student_id' => $lastSTD->id + 1,
                'state' =>  1,
                'date_add' => now()->format('Y-m-d'),
                'date_leave' => null,
                'user_id' => Auth::user()->id,
                'program_id' => $request->program_id,
            ];
            //  dd($data1) ;
            // exit;
            logStudents::create($data1);
            if ($request->name == students::where('name', $request->name)) {
                alert()->warning('هذا الطالب   ' . $request->name . '   موجود بالفعل  .');
                return redirect('students');
            }
            students::create($data);
            alert()->success('تم إضافة الطالب' . $request->name . ' بنجاح .');
            return redirect('students');
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
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
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {

            $data = students::find($id);
            return view('control.students.show', compact('data'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
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
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {

            $data = students::find($id);
            $allUsers = User::all();
            $programs = programs::all();
            return view('control.students.edit', compact('data', 'allUsers', 'programs'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
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
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {

            request()->validate([
                'name' => 'required|min:3',
                'bod' => 'required',
                'phone' => 'required|min:10|max:10',
                'address' => 'required',
                'wallet_id' => 'required',
                'pearint_id' => 'required',
                'photo' => 'mimes:jpg,jpeg,png,gif|max:2048',
                'program_id' => 'required',

            ]);

            if ($request->hasFile('photo')) {
                $files = $request->file('photo');
                $destinationPath = public_path("/image/students/");
                $imgfile = time() . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $imgfile);
            } else {
                $findThisStudnets = students::find($id);
                $imgfile = $findThisStudnets->photo;
            }
            $old = students::find($id);
            $new = $request->program_id;
            if ($old->program_id == $new) {
            } else {
                $newData = [
                    'student_id' => $id,
                    'state' => '2',
                    'date_add' => null,
                    'date_leave' => now(),
                    'user_id' => Auth::user()->id,
                    'program_id' => $old->program_id,
                ];
                $newData1 = [
                    'student_id' => $id,
                    'state' => '1',
                    'date_add' => now(),
                    'date_leave' =>  null,
                    'user_id' => Auth::user()->id,
                    'program_id' => $new,
                ];
                logStudents::create($newData);
                logStudents::create($newData1);
            }
            // echo ;
            // exit;
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
            alert()->success('تم تعديل بيانات الطالب  ' . $request->name . '   بنجاح .');
            return redirect('students');
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
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
        if (Auth::user()->role == 1) {
            $studnet = students::find($id);
            $studnet->delete($id);
            return redirect('studnets');
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
    }
}
