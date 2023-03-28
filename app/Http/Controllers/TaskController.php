<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
    public function create(Workspace $workspace)
    {
        return view('task.create', compact('workspace'));
    }

    public function store(TaskStoreRequest $request, Workspace $workspace)
    {

        $duedate['due_date'] = $workspace->datetime;

        Task::create(
            [
                'workspaces_id'=> $workspace->id,
                'name'=> $request-> name,
                'datetime' => $request -> datetime,
                // 'status' => $request->status,
            ]
            );

        return to_route("workspace.show", compact('workspace'));
    }

    public function delete(Workspace $workspace, Task $task)
    {
        $task->delete();

        return redirect()->route("workspace.show", compact('workspace'));
    }

    public function status(Request $request, Workspace $workspace, Task $task)
    {
        $status = Task::where('workspaces_id',$workspace->id)->where('id',$task->id);

        $status->update([
            'status' => $request->status="done"
        ]);

        return redirect()->route("workspace.show", compact('workspace', 'task'));
    }

    public function edit(Workspace $workspace, Task $task)
    {
        return view('task.update', compact('workspace', 'task'));
    }

    public function update(TaskUpdateRequest $request,Workspace $workspace, Task $task)
    {
        $task->update([
            'name'=> $request-> name,
            'datetime' => $request -> datetime,
        ]);

        return redirect()->route("workspace.show", compact('workspace', 'task'));
    }
}
