<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $workspace = Workspace::all();
        return view('home', compact('workspace'));
    }

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
}
