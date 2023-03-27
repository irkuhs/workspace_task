<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        Workspace::create(
            [
                'user_id'=> auth()->user()->id,
                'name'=> $request-> name,
                'datetime' => $request -> datetime,
                'status' => $request->status,
            ]
            );

        return to_route("home");
    }

    public function show(Workspace $workspace)
    {
        $task = $workspace->task;
        return view('workspace.show', compact('workspace','task'));
    }

    public function delete( Workspace $workspace)
    {
        $workspace->task()->delete();
        $workspace->delete();

        return redirect()->route("home");
    }
}
