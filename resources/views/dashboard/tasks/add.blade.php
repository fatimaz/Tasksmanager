@extends('dashboard.layouts.master')

@section('content')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add Task</h4>
                    <a href="{{route('tasks.index')}}" class="btn btn-primary"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('tasks.store')}}"  method="POST">
                     @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            @error("description")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control" value="{{ old('due_date') }}">
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User </label>
                            <select class="custom-select form-control" name="user_id" required>
                                <option selected disabled>Choose...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                  
                    
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="0" {{ old('status', $task->status ?? 0) == 0 ? 'selected' : '' }}>In Progress</option>
                                <option value="1" {{ old('status', $task->status ?? 0) == 1 ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
@endsection