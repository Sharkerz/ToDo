<?php

namespace App\Http\Controllers;

use App\Sharedtodolist;
use App\Todolist;
use App\User;
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
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $Todos = Todolist::all() -> where('user_id', $user_id);
        $sharedTodos = Sharedtodolist::all()->where('user_id',$user_id);
        $id_todolist_select_acceuil = $request->get('id',null);
        return view('Todolist.index', compact('Todos','sharedTodos','id_todolist_select_acceuil'));
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
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $id_form = $request->input('form_id');
            $id = $request->input('todolist_id');
            $delete = Todolist::where('id', $id)->delete();
                return response()->json(['id_form' =>$id_form],200);
        }
        abort(404); 
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

            $amis = [];

            for($i = 0; $i <= count($list)-1; $i++) {
                if($user_id == $list[$i]['user1']) {
                    array_push($amis, $list[$i]['user2']);
                }
                else if ($user_id == $list[$i]['user2']) {
                    array_push($amis, $list[$i]['user1']);
                }
            }

            $name = [];

            foreach ($amis as $id_amis) {
                $name[$id_amis] = User::where('id', '=', $id_amis)->first()->name;
            }

                return response()->json(['amis'=>$amis, 'name' => $name],200);
        }
        abort(404);
    }
    public function changer_nom(Request $request)
    {
        if ($request->ajax()) {
            $name = $request->input('name_todolist');
            $id = $request->input('id_todolist');

            Todolist::where('id', $id)
                ->update(['name' => $name]);

            return response()->json(['id'=>$id, 'name' => $name],200);
            }
            abort(404);
    }

    public function todolist(Request $request)
    {
          if ($request->ajax()) {
            $user_id = Auth::id();
            $list = Todolist::where('user_id', '=', $user_id)
                ->get();

            $id_todolists = [];

            for($i = 0; $i <= count($list)-1; $i++) {
                    array_push($id_todolists, $list[$i]['id']);
            }

            $name_todolist = [];

            foreach ($id_todolists as $id_todolist) {
                $name_todolist[$id_todolist] = Todolist::where('id', '=', $id_todolist)->first()->name;
            }

            $route_formulaire =   route('selectedtodolist');
            return response()->json(['id'=>$id_todolists, 'name' => $name_todolist,'route_formulaire' => $route_formulaire],200);
            }
            abort(404);
    }
}
