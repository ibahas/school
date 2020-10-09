<?php

namespace App\Http\Controllers;

use App\stafftime;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StafftimeController extends Controller
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
            $data = stafftime::orderBy('id', 'DESC')->get();
            return view('control.stafftime.index', compact('data'));
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
        if (Auth::user()->role == 1) {
            $data = stafftime::orderBy('id', 'DESC')->get();
            $allUsers = User::all();
            return view('control.stafftime.create', compact('data', 'allUsers'));
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
        if (Auth::user()->role == 1) {
            request()->validate([
                'user_id' => 'required',
                'state' => 'required'
            ]);

            // dd($request);
            $date = now()->format('Y-m-d');
            $ifThisExists = stafftime::where('date', $date)->where('user_id', $request->user_id)
                ->where('state', $request->state);
            $thisState = $ifThisExists->first();
            if ($ifThisExists->count() !== 0 && $request->state == $thisState->state) {
                alert()->warning('هذا المحفقظ تم  تسجيل حضور مسبقاً .');
                return redirect()->back();
            } else {
                if($request->state == 1){
                    $vvv = 2;
                }else{
                    $vvv = 1;
                }

                $thisDelete = stafftime::where('user_id', $request->user_id)->where('date', $date)->where('state', $vvv)->first();
                if ($thisDelete !== null) {
                    $stafftime = stafftime::find($thisDelete->id);
                    $stafftime->delete($thisDelete->id);
                    $data = [
                        'user_id' => $request->user_id,
                        'state' => $request->state,
                        'date' => $date,
                    ];
                    stafftime::create($data);
                    alert()->success('تم إضافة الحضور  .');
                    return redirect()->back();
                }
                // dd($thisDelete);
                $data = [
                    'user_id' => $request->user_id,
                    'state' => $request->state,
                    'date' => $date,
                ];
                stafftime::create($data);
                alert()->success('تم إضافة الحضور  .');
                return redirect()->back();
            }
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\stafftime  $stafftime
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //عرض جميع حضور الموظف 
        if (Auth::user()->role == 1) {
            $data =  stafftime::where('user_id', $id)->get();
            return view('control.stafftime.show', compact('data'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stafftime  $stafftime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::user()->role == 1) {
            $data =  stafftime::find($id);
            return view('control.stafftime.edit', compact('data'));
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stafftime  $stafftime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


        if (Auth::user()->role == 1) {
            $user_ids = stafftime::find($id);

            request()->validate([
                'date' => 'required',
                'state' => 'required'
            ]);
            $data = [
                'user_id' => $user_ids->user_id,
                'state' => $request->state,
                'date' => $request->date,
            ];
            // dd($data);
            stafftime::where('id', $id)->update($data);
            $user_id = User::where('id', $user_ids->user_id)->first();
            // dd($user_id);
            // exit;
            alert()->success('تم تعديل حظور الموظف  ' . $user_id->name . '.');
            return redirect('stafftime');
        } else {
            alert()->warning('لا يوجد لديك أي صلاحية للدخول الى هذه الصفحة');
            return redirect('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stafftime  $stafftime
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::user()->role == 1) {
            $stafftime = stafftime::find($id);
            $stafftime->delete($id);
            return redirect('stafftime');
        }
    }
}
