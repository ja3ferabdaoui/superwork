        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!--<img src="{{ asset('materials/assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" />-->
                            <!-- Light Logo icon
                            <img src="{{ asset('materials/assets/images/logo-light-icon.png') }}" alt="homepage" class="light-logo" />-->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                         <!-- dark Logo text
                         <img src="{{ asset('materials/assets/images/logo-text.png') }}" alt="homepage" class="dark-logo" />-->
                         <!-- Light Logo text -->
                         <img src="{{ asset('images/logo-SUPERWORKS.png') }}" class="light-logo" alt="homepage" width="160px" height="50px"/></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box">
                            <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('storage/' . Auth::user()->userAccount->avatar) }}" alt="user" class="profile-pic" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                            <img src="{{ asset('storage/' . Auth::user()->userAccount->avatar) }}" alt="user" >
                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->userAccount->first_name . " " . Auth::user()->userAccount->last_name }}</h4>
                                                <p class="text-muted">{{ Auth::user()->email }}</p>
                                                @if(Auth::user()->isAdmin())
                                                <a href="{!! route('admins.show', ['id'=> Auth::user()->id]) !!}" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                                @elseif(Auth::user()->isClient())
                                                <a href="{!! route('profile') !!}" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                                @endif
                                                </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                    @if(Auth::user()->isAdmin())
                                    <a href="{!! route('admins.show', ['id'=> Auth::user()->id]) !!}">
                                    @elseif(Auth::user()->isClient())
                                    <a href="{!! route('profile') !!}">
                                    @endif
                                    <i class="ti-user"></i> My Profile</a></li>


                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>

                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-fr"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                             <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i> Englich</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
