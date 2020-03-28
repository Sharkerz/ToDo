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

            $this->validate($request, [
                'id_todolist' => 'bail|required|email'
            ]);

            return response ()->json ();
        }
        abort(404);
    }
}
