<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <div id="sidebar-menu">

            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="/">
                        <i data-feather="airplay"></i>

                        <span> Dashboard </span>
                    </a>

                </li>


                <li class="menu-title mt-2">Apps</li>


                <li>
                    <a href="#sidebarMaid" data-bs-toggle="collapse">
                        <i class="fa fas fa-male"></i>
                        <span> Vendor </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaid">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('vendor.create') }}">

                                    <span>create</span>

                                </a>
                            </li>
                            <li>
                                <a href="{{ route('vendor.index') }}">show</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{route('purchase-order.index')}}">
                        <i data-feather="airplay"></i>

                        <span> Purchase Orders </span>
                    </a>

                </li>

{{-- 
                <li>
                    <a href="/">
                        <i data-feather="airplay"></i>

                        <span> SN </span>
                    </a>

                </li>
 --}}





            </ul>
        </div>
        </li>
        </ul>

    </div>
    <!-- End Sidebar -->


<div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->


{{-- <style>
    ul.sidebar-menu {
        margin-top: 80px;
        margin-left: 20px;
        background-color: #1a3869;
        text-align: center;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .sidebar-menu {
        list-style: none;
    }

    ul.sidebar-menu li.logo {
        text-align: center;
        background-color: #fff;
        padding: 10px;
        height: auto;
    }

    ul li {
        list-style: none;
    }

    ul.sidebar-menu li.active,
    ul.sidebar-menu li:hover,
    ul.sidebar-menu li:focus {
        /* background: #9d1e07; */
        cursor: pointer;
    }

    ul.nav-second-level {
        padding: 0px;
    }

    li {
        border-bottom: 1px solid white;
        padding-bottom: 10px
    }

    p.text-center {
        font-size: 33px;
        padding: 0px;
        line-height: initial;
        color: white;
        margin-bottom: 0px;
    }

    span.text-white.ml-3 {
        padding: 0px 23px;
        font-size: 16px;
    }

    .card-body.left-sidebar {
        margin-top: 80px;
        margin-left: 18px;
        background-color: #1a3869;
    }

    .nav-second-level li a {
        padding: 11px 11px !important;
    }

    .left-side-menu.menuitem-active,
    .left-side-menu,
    .side-bar-card {
        background-color: #F4F5F7 !important;
        box-shadow: none;
    }

    .card.ml-3.show {
        background-color: #F3F4F6;
    }
</style> --}}
