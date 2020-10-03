<?php

namespace App\Http\Controllers;

use App\presencestudents;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use function GuzzleHttp\Promise\all;

class PresencestudentsController extends Controller
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
            $data = presencestudents::orderBy('id', 'DESC')->get();
        } else {
            $data = presencestudents::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        if (Auth::user()->role == 4) {
            alert()->warning('لا يوجد لديك أي صلاحية');
            return redirect()->back();
        }
        return view('control.presencestudents.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $check = students::find($id);
        if (Auth::user()->role == 3 && $check->wallet_id == Auth::user()->id) {
            $this_student = students::find($id);
            return view('control.presencestudents.create', compact('this_student'));
        }
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            $this_student = students::find($id);
            return view('control.presencestudents.create', compact('this_student'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية');
            return redirect()->back();
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
            $request->validate([
                'date'       =>  'required',
            ]);
            $data = [
                'date' => $request->date,
                'student_id' => $request->student_id,
                'user_id' => Auth::user()->id,
                'status' => $request->status,
            ];
            $findThisDate = presencestudents::where('date', $request->date)->where('student_id', $request->student_id)->count();
            $dataUserToDeleteing = presencestudents::where('date', $request->date)->where('student_id', $request->student_id)->get();
            $thisExisting = presencestudents::where('date', $request->date)->where('student_id', $request->student_id)->where('status', $request->status)->count();

            if ($request->status == 2 && $thisExisting !== 0) {
                alert()->warning('هذا الطالب لقد تم تسجيله غياب مسبقاً');
                return redirect('students');
            }
            if ($findThisDate == 1 &&  $request->status == 0) {
                alert()->warning('هذا الطالب تم تسجيل حضوره مسبقاً .');
                return redirect()->back();
            }
            if ($findThisDate !== 0 &&  $request->status == 1) {
                alert()->success('تم تسجيل إنصراف بنجاح');
                presencestudents::create($data);
                return redirect('students');
            }
            if ($request->status == 2) {

                // print_r($dataUserToDeleteing[0]->id);
                foreach ($dataUserToDeleteing as $arr2) {
                    $presencestudents = presencestudents::find($arr2->id);
                    $presencestudents->delete($arr2->id);
                }
                presencestudents::create($data);
                echo alert()->success('تم تسجيل غياب للطالب');
                exit;
                return redirect('studnets');
            }
            if ($findThisDate  == 0 && $request->status == 0) {
                alert()->success('تم تسجيل الحضور بنجاح');
                presencestudents::create($data);
                return redirect('students');
            }
        }
        if (Auth::user()->role == 3) {
            $dateNow = now()->format('Y-m-d');
            $data = [
                'date' => now()->format('Y-m-d'),
                'student_id' => $request->student_id,
                'user_id' => Auth::user()->id,
                'status' => $request->status,
            ];
            $dataUserToDeleteing = presencestudents::where('date', $dateNow)->where('student_id', $request->student_id)->get();
            $findThisDate = presencestudents::where('date', $dateNow)->where('student_id', $request->student_id)->count();
            $thisExisting = presencestudents::where('date', $dateNow)->where('student_id', $request->student_id)->where('status', $request->status)->count();
            $thisAbsence = presencestudents::where('date', $dateNow)->where('student_id', $request->student_id)->where('status', 2)->count();
            if ($thisAbsence !==  0) {
                $thisExisting = 1;
            }
            if ($request->status == 2 && $thisExisting !== 0) {
                alert()->warning('هذا الطالب لقد تم تسجيله غياب مسبقاً');
                return redirect('teacherstudents');
            }
            if ($findThisDate == 1 &&  $request->status == 0) {
                alert()->warning('هذا الطالب تم تسجيل حضوره مسبقاً .');
                return redirect()->back();
            }
            if ($findThisDate !== 0 &&  $request->status == 1) {
                alert()->success('تم تسجيل إنصراف بنجاح');
                presencestudents::create($data);
                return redirect('teacherstudents');
            }
            if ($request->status == 2) {

                // print_r($dataUserToDeleteing[0]->id);
                foreach ($dataUserToDeleteing as $arr2) {
                    $presencestudents = presencestudents::find($arr2->id);
                    $presencestudents->delete($arr2->id);
                }
                presencestudents::create($data);
                alert()->success('تم تسجيل غياب للطالب');
                return redirect('teacherstudents');
            }
            if ($findThisDate  == 0 && $request->status == 0) {
                alert()->success('تم تسجيل الحضور بنجاح');
                presencestudents::create($data);
                return redirect('teacherstudents');
            }
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\presencestudents  $presencestudents
     * @return \Illuminate\Http\Response
     */
    public function show(presencestudents $presencestudents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\presencestudents  $presencestudents
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = presencestudents::find($id);

        $check = students::find($data->student_id);
        if (Auth::user()->role == 3 && $check->wallet_id == Auth::user()->id) {
            return view('control.presencestudents.edit', compact('data'));
        }
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            return view('control.presencestudents.edit', compact('data'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\presencestudents  $presencestudents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, presencestudents $presencestudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\presencestudents  $presencestudents
     * @return \Illuminate\Http\Response
     */
    public function destroy(presencestudents $presencestudents)
    {
        //
    }
}
