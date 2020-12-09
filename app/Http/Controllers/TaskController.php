<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;




class TaskController extends Controller
{
    public function index() {

        $tasks = Task::with(['taskState','users'])->orderBy('id','desc')->get();
        return response()->json($tasks,200);
    }

    public function show($id) {
        $task = Task::where('id',$id)->with(['taskState','users'])->findOrFail($id);
        return response()->json($task,200);
    }

    public function store(Request $request) {

        $validator = \Validator::make($request->all(),[
            'title' => ['required'],
            'priority' => ['required'],
            'task_state_id' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        } 
        else {
            $task = new Task();
            $task->fill($request->all());
            $task->save();
            if ($request->has('user_ids')) {
                $task->users()->sync($request->user_ids, true);
            }
            return response()->json([
                'message'=> ['Task Stored']
            ]);
        }
    }

    public function update(int $id, Request $request) {
        $validator = \Validator::make($request->all(),[
            'title' => ['sometimes','required'],
            'priority' => ['sometimes','required'],
            'task_state_id' => ['sometimes','required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        } 
        else {
            $task = Task::findOrFail($id);
            $task->fill($request->all());
            if ($request->has('user_ids')) {
                $task->users()->sync($request->user_ids, true);
            }
            $task->update();
            return response()->json([
                'message'=> ['Task Updated']
            ]);
        }
    }

    public function destroy(int $id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json([
            'message'=> ['Task Deleted']
        ]);
    }
}


// Action  Route Name
// GET           /users                      index   users.index
// GET           /users/create               create  users.create
// POST          /users                      store   users.store
// GET           /users/{user}               show    users.show
// GET           /users/{user}/edit          edit    users.edit
// PUT|PATCH     /users/{user}               update  users.update
// DELETE        /users/{user}               destroy users.destroy