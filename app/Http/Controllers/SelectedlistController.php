<?php

namespace App\Http\Controllers;

use App\Task;
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
            $list = Task::where('todolist_id', '=', $id)
                ->get();

            $tasks = [];

            for($i = 0; $i <= count($list)-1; $i++) {
                    array_push($tasks, $list[$i]['id']);
            }

            $content = [];
            $finished = [];

            foreach ($tasks as $task) {
                $content[$task] = Task::where('id', '=', $task)->first()->content;
                $finished[$task] = Task::where('id', '=', $task)->first()->finish;
            }
            return response()->json(['id_todolist'=>$id,'name_todolist' =>$name,'tasks' =>$tasks,'content' =>$content,'finished' => $finished],200);
        }
        abort(404);
    }
}
