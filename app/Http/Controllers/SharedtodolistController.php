<?php

namespace App\Http\Controllers;

use App\Sharedtodolist;
use Illuminate\Http\Request;

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
        return view('Sharedtodolist.create');
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

    public function amis(Request $request)
    {
        if ($request->ajax()) {
            $user_id = Auth::id();

            /* Liste des demandes d'amis */
            $list = Amis::where('user2', '=', $user_id)
                ->where('pending', '=', 0)
                ->get();
            $size = sizeof($list);

            /* Renvoie notif:yes si il y a au moins une demande en attente. */
            if($size == 0) {
                return response()->json(['notif'=>'no'],200);
            }
            else {
                return response()->json(['notif'=>'yes'],200);
            }
        }
        abort(404);
    }
}
