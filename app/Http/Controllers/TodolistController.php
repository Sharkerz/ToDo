<?php

namespace App\Http\Controllers;

use App\Sharedtodolist;
use App\Todolist;
use Illuminate\Http\Request;
use Auth;
use App\Amis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $Todos = Todolist::all() -> where('user_id', $user_id);
        $sharedTodos = Sharedtodolist::all()->where('user_id',$user_id);
        return view('Todolist.index', compact('Todos','sharedTodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Todolist::create([
            "name" => $request->input('name'),
            "user_id" => Auth::user()->id,
        ]);
        return Redirect::route('Todolist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function show(Todolist $todolist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function edit(Todolist $todolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todolist $todolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todolist  $todolist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todolist $todolist)
    {
        //
    }

    public function amis(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::id();
            $list = Amis::where('user1', '=', $user_id)
                ->where('pending', '=', 1)
                ->orWhere('user2', '=', $user_id)
                ->where('pending', '=', 1)
                ->get();

                return response()->json(['amis'=>$list],200);
        }
        abort(404);
    }
}
