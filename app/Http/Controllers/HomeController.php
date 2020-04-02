<?php

namespace App\Http\Controllers;
use Auth;
use App\Todolist;
use App\Amis;
use App\Sharedtodolist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $Todos = Todolist::all() -> where('user_id', $user_id);
        $nbr_Todos = sizeof($Todos); 

        $Amis = Amis::where('user1', '=', $user_id)
        ->where('pending', '=', 1)
        ->orWhere('user2', '=', $user_id)
        ->where('pending', '=', 1)
        ->get();
        $nbr_Amis = sizeof($Amis);

        $list = Amis::where('user2', '=', $user_id)
        ->where('pending', '=', 0)
        ->get();
        $size_ami = sizeof($list);

        /* Liste des demandes de partage */
        $list2 = Sharedtodolist::where('user_id', '=', $user_id)
            ->where('pending', '=', 0)
            ->get();

        $size_shared = sizeof($list2);

        $nbr_notif=$size_ami+$size_shared;
        return view('home',compact('Todos','nbr_Todos','nbr_Amis','nbr_notif'));
    }
}
