@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Workspace untuk {{$task->name}}</div>

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

                    <form method="POST" action="{{ route('task.update', [$workspace,$task]) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="{{$task->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Works Duration before: {{$workspace->datetime}}</label>
                            <input type="datetime-local" class="form-control" name="datetime">
                        </div>
                        <div class="modal-footer mt-3">
                            <a href="{{ route('workspace.show', $workspace) }}" button type="button" class="btn btn-outline-secondary">Back</button></a>
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                            <button type="reset" class="btn btn-outline-danger" value="reset">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
