<?php

namespace App\Http\Controllers;

use App\presencestudents;
use App\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PresencestudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->role == 1 || Auth::user()->role == 2 ){
            $data = presencestudents::all();
        }else{
            $data = presencestudents::where('user_id',Auth::user()->id)->get();
        }if(Auth::user()->role == 4){
            alert()->warning('لا يوجد لديك أي صلاحية');
            return redirect()->back();
        }
        return view('control.presencestudents.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $this_student = students::find($id);
        return view('control.presencestudents.create', compact('this_student'));
        
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
    public function edit(presencestudents $presencestudents)
    {
        //
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
