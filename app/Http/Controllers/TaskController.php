<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use App\Mail\TaskDoneMail;
use App\Mail\TaskCreateMail;
use App\Mail\TaskDeleteMail;
use App\Mail\TaskUpdateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
    public function create(Workspace $workspace)
    {
        //$this->authorize('create', $workspace);
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

        Mail::to($workspace->user)->send(new TaskCreateMail($workspace));

        return to_route("workspace.show", compact('workspace'));
    }

    public function delete(Workspace $workspace, Task $task)
    {
        $this->authorize('delete', $workspace, $task);
        $task->delete();
        Mail::to($workspace->user)->send(new TaskDeleteMail($task));

        return redirect()->route("workspace.show", compact('workspace'));
    }

    public function status(Request $request, Workspace $workspace, Task $task)
    {
        $status = Task::where('workspaces_id',$workspace->id)->where('id',$task->id);

        $status->update([
            'status' => $request->status="done"
        ]);

        Mail::to($workspace->user)->send(new TaskDoneMail($task));

        return redirect()->route("workspace.show", compact('workspace', 'task'));
    }

    public function edit(Workspace $workspace, Task $task)
    {
        $this->authorize('update', $workspace, $task);
        return view('task.update', compact('workspace', 'task'));
    }

    public function update(TaskUpdateRequest $request,Workspace $workspace, Task $task)
    {
        $task->update([
            'name'=> $request-> name,
            'datetime' => $request -> datetime,
        ]);

        Mail::to($workspace->user)->send(new TaskUpdateMail($task));
        return redirect()->route("workspace.show", compact('workspace', 'task'));
    }
}
