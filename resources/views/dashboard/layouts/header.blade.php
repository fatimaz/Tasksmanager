    {{-- <----Header Section----> --}}
        
        <header>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: white; padding: 10px 20px; border-bottom: 1px solid #ddd;">
                <div class="container-fluid d-flex align-items-center justify-content-between">
                    <!-- Logo Section -->
                    <div class="logo">
                            <a href="{{ route('dashboard') }}" class="btn  me-2">
                        <span class="logo-text">Task Management</span></a>
                    </div>
    
                </div>
                
                        @auth  {{-- If the user is logged in --}}
                       <!-- Header Links -->
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else {{-- If the user is NOT logged in --}}
                            <div class="d-flex">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                            </div>
                        @endauth
          
            </nav>
        </header>
        {{-- <----End Header Section----> --}}
        