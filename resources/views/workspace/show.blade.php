@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-2">
                <div class="card-header">Task dari {{$workspace->name}}</div>
                    <div class="card-body">
                        <a href="{{route('home')}}" button type="button" class="btn btn-outline-danger">Back</button></a>
                        <a href="{{route('task.', $workspace)}}" button type="button" class="btn btn-outline-primary">Add Task</button></a>
                    </div>
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
                                <tr>
                                    <td>
                                        <a href="" button type="button" class="btn btn-outline-info">Edit</button></a>
                                        <a href="" button type="button" class="btn btn-outline-warning">Delete</button></a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
