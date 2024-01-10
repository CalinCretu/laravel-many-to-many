@extends('layouts.app')
@section('content')
    <section>
        <div class="container">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" required name="name" id="name" placeholder="Project Name"
                        value="{{ old('name', $project->name) }}">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" class="form-control" required name="start_date" id="start_date"
                        value="{{ old('start_date', $project->start_date) }}">
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" class="form-control" name="end_date" id="end_date"
                        value="{{ old('end_date', $project->end_date) }}">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option value="{{ old($project->status) }}">{{ $project->status }}</option>
                        <option value="pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="ongoing" {{ old('status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type_id" class="form-label">Types</label>
                    <select class="form-select" name="type_id" id="type_id">
                        <option>Select a Type</option>
                        @foreach ($types as $type)
                            <option @selected(old('type_id', optional($project->type)->id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Project Description">{{ old('description', $project->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Edit">
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endsection
