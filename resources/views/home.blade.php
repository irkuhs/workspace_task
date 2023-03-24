@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard milik ')}}{{ Auth::user()->name }}</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addWorkspaceModal">Add Work</button>
                        <div class="card mt-2">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date Time</th>
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
                                        @if ($workspace->status == '0')
                                            <td>Done</td>
                                            @else
                                            <td>Pending</td>
                                        @endif
                                        <td>
                                            <a href="" button type="button" class="btn btn-outline-info">Edit</button></a>
                                            <a href="" button type="button" class="btn btn-outline-warning">Delete</button></a>
                                            <a href="{{ route('workspace.show', $workspace) }}" button type="button" class="btn btn-outline-danger">Show</button></a>
                                        </td>
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
                                    <form method="POST" action="{{ route('workspace.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label">Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="Workspace Name">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Date</label>
                                            <input type="datetime-local" class="form-control" name="datetime">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Status:</label>
                                            <select name="status" class="form-control" id="status">
                                                <option selected value="" disabled selected hidden></option>
                                                <option value="0">Done</option>
                                                <option value="1">Pending</option>
                                            </select>
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
