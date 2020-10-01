<?php

namespace App\Http\Controllers;

use App\stafftime;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StafftimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::user()->role == 1 || Auth::user()->role == 2) {
            $data = stafftime::all();
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
            $data = stafftime::all();
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
                'data' => 'required',
                'state' => 'required'
            ]);

            $data = [
                'user_id' => $request->user_id,
                'state' => $request->state,
                'date' => $request->date,
            ];

            stafftime::create($data);
            alert()->success('تم إضافة الحضور بنجاح .');
            return redirect('stafftime');
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
            request()->validate([
                'user_id' => 'required',
                'data' => 'required',
                'state' => 'required'
            ]);
            $data = [
                'user_id' => $request->user_id,
                'state' => $request->state,
                'date' => $request->date,
            ];
            // dd($data);
            stafftime::where('id', $id)->update($data);
            $user_id = User::find($id);

            alert()->success('تم تعديل حظور الموظف  ' . $user_id->name . '   بنجاح .');
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
