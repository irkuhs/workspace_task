<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Http\Requests\WorkspaceStoreRequest;
use App\Http\Requests\WorkspaceUpdateRequest;

class WorkspaceController extends Controller
{
    public function store(WorkspaceStoreRequest $request)
    {
        //dd($request->all());
        Workspace::create(
            [
                'user_id'=> auth()->user()->id,
                'name'=> $request-> name,
                'datetime' => $request -> datetime,
                'status' => $request->status
            ]
            );

        return to_route("home");
    }

    public function show(Workspace $workspace)
    {
        $this->authorize('view', $workspace);
        $task = $workspace->task;
        return view('workspace.show', compact('workspace','task'));
    }

    public function delete(Workspace $workspace)
    {
        $this->authorize('delete', $workspace);
        $workspace->task()->delete();
        $workspace->delete();

        return redirect()->route("home");
    }

    public function edit(Workspace $workspace)
    {
        $this->authorize('update', $workspace);
        return view('workspace.update', compact('workspace'));
    }

    public function update(WorkspaceUpdateRequest $request, Workspace $workspace)
    {
        $this->authorize('update', $workspace);
        $workspace->update([
            'user_id'=> auth()->user()->id,
            'name'=> $request-> name,
            'datetime' => $request -> datetime,
            'status' => $request->status,
        ]);

        return redirect()->route("home");
    }

    public function search(Request $request)
    {
        if($request->keyword){
            $workspace = Workspace::query()
                        ->where('user_id',  auth()->user()->id)
                        ->where('name','LIKE','%'.$request->keyword.'%');
        }
        else
        {
            $workspace = auth()->user()->inventories()->paginate(5);
        }
        return view('home',compact('workspace'));
    }
}
