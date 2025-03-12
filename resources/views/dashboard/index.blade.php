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

    </div>
@endsection
