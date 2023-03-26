@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Task dari {{$workspace->name}}</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('task.store', $workspace) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Workspace Name">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Before Workspace Due Date :  {{$workspace->datetime}}</label>
                            <input type="datetime-local" class="form-control" name="datetime">
                        </div>
                        {{-- <div class="mb-3">
                            <label class="col-form-label">Status:</label>
                            <input type="text" class="form-control" name="status" value="pending" placeholder="pending" readonly>
                        </div> --}}
                        <div class="modal-footer">
                            <a href="{{ route('workspace.show', $workspace) }}" button type="button" class="btn btn-outline-secondary">Back</button></a>
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                            <button type="reset" class="btn btn-outline-danger">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
