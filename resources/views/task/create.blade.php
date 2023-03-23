@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Type of Task</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Workspace Name">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Date and Time</label>
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
                            <a href="{{ route('task.show') }}" button type="button" class="btn btn-outline-secondary">Back</button></a>
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                            <button type="button" class="btn btn-outline-danger">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
