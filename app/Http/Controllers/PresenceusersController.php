<?php

namespace App\Http\Controllers;

use App\presenceusers;
use Illuminate\Http\Request;

class PresenceusersController extends Controller
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
     * @param  \App\presenceusers  $presenceusers
     * @return \Illuminate\Http\Response
     */
    public function show(presenceusers $presenceusers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\presenceusers  $presenceusers
     * @return \Illuminate\Http\Response
     */
    public function edit(presenceusers $presenceusers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\presenceusers  $presenceusers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, presenceusers $presenceusers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\presenceusers  $presenceusers
     * @return \Illuminate\Http\Response
     */
    public function destroy(presenceusers $presenceusers)
    {
        //
    }
}
