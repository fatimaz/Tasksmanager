@extends('dashboard.layouts.master')

@section('content')
        <div class="col-md-10">
            @include('dashboard.includes.alerts.success')
            @include('dashboard.includes.alerts.errors')

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                 
                    <h4 class="mb-0">
                        Users
                        @if(isset($title))
                        {{ $title }}
                     @endif    
                        
                     </h4>
                     @if(isset($title))
                         <!-- If user or title exists, show the Back button -->
                         <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
                     @else
                         <!-- If user or title does not exist, show the Add Task button -->
                         <a href="{{ route('users.create') }}" class="btn btn-primary">Add Task</a>
                    @endisset

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>       
                                    <td>
                                            <div class="dropdown show">
                                                 <a class="btn btn-primary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                                        <i style="color: blue" class="fa fa-edit"></i>&nbsp;Edit
                                                    </a>
                                                    <a class="dropdown-item" data-bs-target="#Delete_User{{ $user->id }}" data-bs-toggle="modal" href="##Delete_User{{ $user->id }}">
                                                        <i style="color: red" class="fa fa-trash"></i>&nbsp;Delete
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('users.update.password', $user->id) }}">
                                                        <i style="color: orange" class="fa fa-spinner fa-spin"></i>&nbsp;Change Password
                                                    </a>
                                                </div>
                                            </div>
                                            
                                        </td>
                                    </td>
                                    @include('dashboard.users.delete') 
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    </div>
                    
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
        </div>

@endsection