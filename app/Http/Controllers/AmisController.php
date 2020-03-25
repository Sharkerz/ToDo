<?php

namespace App\Http\Controllers;

use App\Amis;
use Illuminate\Http\Request;

class AmisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Amis.index');
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
     * @param  \App\Amis  $amis
     * @return \Illuminate\Http\Response
     */
    public function show(Amis $amis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amis  $amis
     * @return \Illuminate\Http\Response
     */
    public function edit(Amis $amis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amis  $amis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amis $amis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amis  $amis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amis $amis)
    {
        //
    }
}
