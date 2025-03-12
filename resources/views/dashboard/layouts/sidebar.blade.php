<div class="col-md-2">
    <div class="card card-statistics h-100">
        <!-- SIDEBAR USERPIC -->
        {{-- <div class="profile-userpic">
            <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-fluid" alt="">
        </div> --}}
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">
              {{auth()->user()->name}}
            </div>
            <div class="profile-usertitle-job">
                {{auth()->user()->email}}
            </div>
        </div>

        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav flex-column">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}">
                        <i class="fa fa-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="{{ Request::is('users*') ? 'active' : '' }}">
                    <a href="{{route('users.index')}}">
                        <i class="fa fa-user"></i>
                       Users 
                    </a>
                </li>
                <li>
                    <a href="{{route('tasks.index')}}">
                        <i class="fa fa-check"></i>
                        Tasks
                    </a>
                </li>
                <li>
                    <a href="{{route('profile.edit')}}">
                        <i class="fa fa-flag"></i>
                        Profile
                    </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
</div>
