<?php

namespace App\Http\Controllers;
use Auth;
use App\Todolist;
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
        return view('home',compact('Todos'));
    }
}
