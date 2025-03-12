@extends('dashboard.layouts.master')

@section('content')
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add User</h4>
                    <a href="{{route('users.index')}}" class="btn btn-primary"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('users.store')}}"  method="POST">
                     @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                            @error("name")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
                            @error("email")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}" />
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
@endsection