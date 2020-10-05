<?php

namespace App\Http\Controllers;

use App\coursestudents;
use Illuminate\Http\Request;

class CoursestudentsController extends Controller
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
        $data = coursestudents::orderBy('id', 'DESC')->get();
        return view('control.coursestudents.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\coursestudents  $coursestudents
     * @return \Illuminate\Http\Response
     */
    public function show(coursestudents $coursestudents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coursestudents  $coursestudents
     * @return \Illuminate\Http\Response
     */
    public function edit(coursestudents $coursestudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coursestudents  $coursestudents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coursestudents $coursestudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coursestudents  $coursestudents
     * @return \Illuminate\Http\Response
     */
    public function destroy(coursestudents $coursestudents)
    {
        //
    }
}
