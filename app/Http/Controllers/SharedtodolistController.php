<?php

namespace App\Http\Controllers;

use App\Amis;
use App\Sharedtodolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
            "user_id" => $request->input('id'),
            "todolist_id" =>$request->input('todolist_id'),
            "permissions" => $request->input('permissions'),
        ]);
        return Redirect::route('Todolist.index');
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

    public function accepter(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id_shared');

            $this->validate($request, [
                'id_shared' => 'required',
            ]);
            Sharedtodolist::where('id', $id)
                ->update(['pending' => 1]);

            return response()->json(['accepter_shared'=>$id], 200);
        }
        abort(404);
    }

    public function refuser(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id_shared');

            $this->validate($request, [
                'id_shared' => 'required',
            ]);
            Sharedtodolist::where('id', $id)
                ->delete();

            return response()->json(['refuser_shared'=>$id], 200);
        }
        abort(404);
    }
}
