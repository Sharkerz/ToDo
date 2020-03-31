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
        if ($request->ajax()) {

            $id = $request->input('id_todolist');
            $name = $request->input('name_todolist');

            return response()->json(['id_todolist'=>$id,'name_todolist' =>$name],200);
        }
        abort(404);
    }
}
