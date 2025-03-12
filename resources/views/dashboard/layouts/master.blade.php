<!DOCTYPE html>
<html lang="en">
        {{-- Include the css head section  --}}
@include('dashboard.layouts.head')

<body id="page-top">   
  {{-- Include the header section --}}
    @include('dashboard.layouts.header')
    <div class="container-fluid">
        <div class="content-div">
                <div class="row">
                          <!-- Include the sidebar section -->
                        @include('dashboard.layouts.sidebar')  
                        @yield('content')
                </div>
        </div>
    </div>
  <!-- Include the js footer section -->
  @include('dashboard.layouts.footer')
</body>
</html>

