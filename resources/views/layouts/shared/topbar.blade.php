<!-- Topbar Start -->
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">


            <li class="dropdown notification-list topbar-dropdown pb-0">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('images/user-logo.png')}}" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ms-1 ">
                        {{ auth()->user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                   
              
                        

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>
                    </form>

                </div>
            </li>

         
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="/" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/android-chrome-192x192.png')}}" alt="" height="22">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-lg">
                    <img src="{{asset('assets/images/android-chrome-192x192.png')}}" alt="" height="20">
                    <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
            </a>

            <a href="/" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{asset('assets/images/android-chrome-192x192.png')}}" alt="" height="55">
                </span>
                <span class="logo-lg text-white">
                    <img src="{{asset('assets/images/android-chrome-192x192.png')}}" alt="" height="70"> Asset Development
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
       
           
            <li class="pb-0">
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>
          

             

        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<!-- end Topbar -->
