@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-10">
        <div class="row">
            <!-- Tasks in Progress -->
            <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-success">
                                    <i class="fas fa-tasks mr-1 highlight-icon" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"> Tasks in Progress</p>
                                <h4>{{$tasksInProgress}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fas fa-tasks mr-1" aria-hidden="true"></i> <a href="{{route('tasks.inprogress')}}"><span class="text-danger"> Show all inprogress tasks</span></a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tasks Completed -->
            <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-warning">
                                    <i class="fas fa-check-circle mr-1 highlight-icon" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"> Tasks Completed</p>
                                <h4>{{$tasksCompleted}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fas fa-check-circle mr-1" aria-hidden="true"></i>  <a href="{{route('tasks.completed')}}""><span class="text-danger"> Show all completed tasks</span></a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="col-xl-4 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                <span class="text-success">
                                    <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark"> Users with In Progress Tasks</p>
                                <h4>{{$usersWithInProgressTasks}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <i class="fas fa-users mr-1" aria-hidden="true"></i><a href="{{route('users.tasks.inprogress')}}"><span class="text-danger"> Show users with in progress tasks</span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-12 mb-30 mt-4">
                <h4>Overdue Tasks</h4>

        <div class="span5 mt-3">
            <table class="table table-striped table-condensed">
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
                @isset($tasks)
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                     <td>{{ $task->due_date ? $task->due_date->format('Y-m-d') : 'No Due Date' }}</td>
                    <td>{{ $task->user->name }}</td>
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
                @endisset                               
              </tbody>
            </table>
            </div>
            </div>
        </div>
        <div class="mt-3 d-flex justify-content-center">
            {{ $tasks->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
