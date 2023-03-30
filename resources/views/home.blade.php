@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard milik ')}}{{ Auth::user()->name }}</div>
                    <div class="card-body">
                        <form action="{{route('workspace.search')}}" method="GET">
                            <div class="input-group-append mt-2 p-1">
                                <input type="text" class="form-control" name="keyword" placeholder="Search by Inventory Name">
                                <div class="input-group-append mt-2">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                    <a href="{{route('home')}}" button class="btn btn-primary" type="submit">Refresh</button></a>
                                </div>
                            </div>
                        </form>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addWorkspaceModal">Add Work</button>
                        <div class="card mt-2">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Works Duration before</th>
                                        <th scope="col">Attachment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $workspace as $key => $workspace)
                                    <tr>
                                        <th scope="row">{{ $key+1}}</th>
                                        <td>{{ $workspace->name}}</td>
                                        <td>{{ $workspace->datetime}}</td>
                                        <td>
                                            <a href="{{ asset('storage/workspace/'.$workspace->attachment) }}" target="_blank">{{ $workspace->attachment }}</a>
                                        </td>
                                        @if ($workspace->status == "pending")
                                            <td>Pending</td>
                                            <td>
                                                <a href="{{ route('workspace.show', $workspace) }}" button type="button" class="btn btn-outline-danger">Show</button></a>
                                                <a href="{{ route('workspace.delete', $workspace) }}" button type="button" class="btn btn-outline-warning">Delete</button></a>
                                                <a href="{{ route('workspace.edit', $workspace) }}" button type="button" class="btn btn-outline-info">Edit</button></a>
                                            </td>
                                            @else
                                                <td>Done</td>
                                                <td>
                                                    <a href="{{ route('workspace.show', $workspace) }}" button type="button" class="btn btn-outline-danger">Show</button></a>
                                                    <a href="{{ route('workspace.delete', $workspace) }}" button type="button" class="btn btn-outline-warning">Delete</button></a>
                                                </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="addWorkspaceModal" tabindex="-1" aria-labelledby="addWorkspaceModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addWorkspaceModal">Workspace Task Baru</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('workspace.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <label class="col-form-label">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Workspace Name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Works Duration before</label>
                                            <input type="datetime-local" class="form-control" name="datetime">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Status:</label>
                                            <input type="text" class="form-control" name="status" value="pending" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Default file input example</label>
                                            <input class="form-control" type="file" name="attachment">
                                          </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-primary">Add</button>
                                            <button type="button" class="btn btn-outline-danger">Clear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
