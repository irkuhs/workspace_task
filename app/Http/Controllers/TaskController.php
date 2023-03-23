<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show()
    {
        return view('task.show');
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        Task::create(
            [
                'workspace_id'=> $request->id,
                'name'=> $request-> name,
                'datetime' => $request -> datetime,
                'status' => $request->status,
            ]
            );

        return to_route("task.show");
    }
}
