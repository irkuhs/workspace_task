<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function create(Workspace $workspace)
    {
        return view('task.create', compact('workspace'));
    }

    public function store(Request $request, Workspace $workspace)
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
}
