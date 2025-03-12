@extends('dashboard.layouts.master')

@section('content')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Edit Task</h4>
                    <a href="{{route('tasks.index')}}" class="btn btn-primary"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('tasks.update',$task->id)}}"  method="POST">
                     @csrf
                     @method('PUT')
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $task->name }}" />
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
                            @error("description")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control" value={{ $task->due_date }}>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User</label>
                            <select class="custom-select form-control" name="user_id" required>
                                <option selected disabled>Choose...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" 
                                        @if(old('user_id', $task->user_id) == $user->id) 
                                            selected 
                                        @endif>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                    
             
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="0" {{ old('status', isset($task) ? $task->getStatus() : '') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="1" {{ old('status', isset($task) ? $task->getStatus() : '') == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @error("status")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

@endsection