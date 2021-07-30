<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function create(Request $request)
    {
        $task = new Todolist();

        $task->content = $request->input('content');
        
        $task->save();
        return response()->json($task);
    }

    public function list()
    {
        $task = Todolist::all();

        return response()->json($task);
    }

    public function listById($id)
    {
        $task = Todolist::find($id);

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Todolist::find($id);
        $task->content = $request->input('content');

        $task->save();
        return response()->json($task);
    }

    public function deletetask($id)
    {
        $task = Todolist::find($id);
        $task->delete();
        
        //$task->save();

        return response()->json($task);
    }

    public function complete($id)
    {
        $task = Todolist::find($id);
        $task = Todolist::where('id',$id)->first();

        $complete = $task->is_completed;
        if($complete == 'not completed')
        {
            $task->update([
                "is_completed"=>"complete"
            ]);
        }
        $task->save();
        return response()->json($task);

    }
}
