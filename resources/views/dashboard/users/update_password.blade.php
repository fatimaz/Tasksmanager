@extends('dashboard.layouts.master')

@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Edit Password for {{$user->name}}</h4>
                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('update_password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="password">New password</label>
                        <input type="password" class="form-control" id="password" name="password" >
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        @error("password")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        @error("password_confirmation")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
