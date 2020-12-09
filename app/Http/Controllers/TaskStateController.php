<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskState;


class TaskStateController extends Controller
{
    public function index() {
        $taskStates = TaskState::with(['tasks.users'])->orderBy('order','asc')->get();
        return response()->json($taskStates,200);
    }

    public function show($id) {
        $taskState = TaskState::where('id',$id)->with(['tasks.users'])->findOrFail($id);
        return response()->json($taskState,200);
    }

    public function store(Request $request) {

        $validator = \Validator::make($request->all(),[
            'title' => ['required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        } 
        else {
            $taskState = new TaskState();
            $taskState->fill($request->all());
            $taskState->order = $this->findNewTaskStateOrder();
            $taskState->save();
            return response()->json([
                'message'=> ['Task State Stored']
            ]);
        }
    }

    public function update(int $id, Request $request) {
        $validator = \Validator::make($request->all(),[
            'title' => ['sometimes','required'],
            'order' => ['sometimes','required']
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 400);
        } 
        else {
            $taskState = TaskState::findOrFail($id);
            $taskState->fill($request->all());
            $taskState->update();
            return response()->json([
                'message'=> ['Task State Updated']
            ]);
        }
    }

    public function destroy(int $id) {
        $taskState = TaskState::with(['tasks'])->findOrFail($id);

        if (count($taskState->tasks) > 0) {
            return response()->json(['message'=> ['You must move tasks on this task state to another any task states']],405);
        }

        $taskState->delete();
        return response()->json([
            'message'=> ['Task State Deleted']
        ]);
    }

    private function findNewTaskStateOrder(): int{
        $taskStates = TaskState::with(['tasks'])->orderBy('order','desc')->first();
        return $taskStates->order + 1;
    }

}