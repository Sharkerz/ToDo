<?php

namespace App\Http\Controllers;

use App\Todolist;
use Illuminate\Http\Request;

class SelectedlistController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        //if ($request->ajax()) {

//            $Validator = $Validator::make(
//                $request->all(),
//            )
        return response()->json(['message'=>'working'],200);
        //}
        //abort(404);
    }
}
