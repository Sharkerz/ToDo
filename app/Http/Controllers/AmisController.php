<?php

namespace App\Http\Controllers;

use App\User;
use App\Amis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;

class AmisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $list = Amis::where('user1', '=', $user_id)
            ->where('pending', '=', 1)
            ->orWhere('user2', '=', $user_id)
            ->where('pending', '=', 1)
            ->get();


        return View::make('Amis.index')->with('list', $list);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (User::where('name', '=', $request->input('name'))->exists()) {
            $id_user2 = $request->input('name');
            $id = User::where('name', $id_user2)->first()->id;
            Amis::create([
                "user1" => Auth::id(),
                "user2" => $id,
                "pending" => 0,
            ]);
            return Redirect::route('Amis.index');
        }
        else {
            return Redirect::route('Amis.index');
        }

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

    public function accepter(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['tes'=>'salut'], 200);
        }
        abort(404);
    }

    public function refuser(Amis $amis)
    {
        //
    }
}
