@extends('dashboard.layouts.master')

@section('content')
{{-- <div class="container mt-4">
    <div class="row"> --}}
        <div class="col-md-10">
            @include('dashboard.includes.alerts.success')
            @include('dashboard.includes.alerts.errors')

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        @if(isset($title))
                           {{ $title }}
                        @endif    
                        @isset($user)
                             {{ $user->name }}
                        @endisset
                           Tasks
                        </h4>
                        @if(isset($user) || isset($title))
                            <!-- If user or title exists, show the Back button -->
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
                        @else
                            <!-- If user or title does not exist, show the Add Task button -->
                            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
                       @endisset
         
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Due Date</th>
                                <th>Responsible user</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'No Due Date' }}</td>
                                    <td><a href="{{ route('tasks.showByUser', $task->user_id) }}">{{ $task->user->name }}</a></td>
                                    <td>
                                        @if ($task->getStatus() == 'in-progress')
                                        <span class="btn btn-warning btn-sm">In Progress</span>
                                    @else
                                        <span class="btn btn-success btn-sm">Completed</span>
                                    @endif
                                    
                                    </td>        
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('tasks.edit', $task->id) }}">
                                                    <i style="color: blue" class="fa fa-edit"></i>&nbsp;Edit
                                                </a>
                                                <a class="dropdown-item" data-bs-target="#Delete_Task{{ $task->id }}" data-bs-toggle="modal" href="##Delete_Task{{ $task->id }}">
                                                    <i style="color: red" class="fa fa-trash"></i>&nbsp;Delete
                                                </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#update_status{{ $task->id }}">
                                                    <i style="color: orange" class="fa fa-spinner fa-spin"></i>&nbsp;Change status
                                                </a>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    @include('dashboard.tasks.delete') 
                                    @include('dashboard.tasks.update_status')
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    </div>
                    
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{ $tasks->links('pagination::bootstrap-5') }}
            </div>
        </div>
    {{-- </div>
</div> --}}

@endsection