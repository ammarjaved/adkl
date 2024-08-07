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

                @if(Auth::user()->type === 'admin')
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
               @endif
               <li>
                    <a href="#sidebarPO" data-bs-toggle="collapse">
                        <i data-feather="file"></i>
                        <span> Purchase Order </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarPO">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('purchase-order.create') }}">
                                    <span>create</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('purchase-order.index') }}">show</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarSN" data-bs-toggle="collapse">
                        <i data-feather="file"></i>
                        <span> Service No </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarSN">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('service-no.create') }}">
                                    <span>create</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('service-no.index') }}">show</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="/map-filter" >
                        <i data-feather="map"></i>
                        <span> Map </span>

                    </a>
                </li>






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
