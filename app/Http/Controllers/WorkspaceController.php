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
        return view("workspace.show", compact('workspace'));
    }
}
