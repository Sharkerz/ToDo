<?php

namespace App\Http\Controllers;

use App\Task;
use Dotenv\Result\Success;
use Illuminate\Http\Request;

class TaskController extends Controller
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
    public function create(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('list_id');
            $content = $request->input('content');

            Task::create([
                "todolist_id" => $id,
                "content" => $content,
                'finish' =>false,
            ]);

                return response()->json([],200);
            }
            abort(404); 
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
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        if ($request->ajax()) {
            $id = $request->input('id_task');

            Task::where('id', $id)
                ->update(['finish' => true]);

                return response()->json(['task' =>Task::where('id', $id)->first()],200);
            }
            abort(404); 
    }
 
    public function delete(Request $request)
    {
        if ($request->ajax()) {
          
            $id = $request->input('id_task');
            $delete = Task::where('id', $id)->first();

            Task::where('id', $id)
                ->delete();

                return response()->json(['task' =>$delete],200);
        }
        abort(404); 
    }
}
