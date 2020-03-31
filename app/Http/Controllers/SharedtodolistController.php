<?php

namespace App\Http\Controllers;

use App\Sharedtodolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SharedtodolistController extends Controller
{
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
        Sharedtodolist::create([
            "permissions" => $request->input('permissions'),
            "user_id" => $request->input('id'),
            "todolist"=> $request->input('id_todolist')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sharedtodolist  $sharedtodolist
     * @return \Illuminate\Http\Response
     */
    public function show(Sharedtodolist $sharedtodolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sharedtodolist  $sharedtodolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Sharedtodolist $sharedtodolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sharedtodolist  $sharedtodolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sharedtodolist $sharedtodolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sharedtodolist  $sharedtodolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sharedtodolist $sharedtodolist)
    {
        //
    }
}
