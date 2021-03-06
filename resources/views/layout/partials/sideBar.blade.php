<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url(materials/assets/images/background/user-ino.jpg) no-repeat;">
                    <!-- User profile image -->
                       <div class="profile-img"><img src="{{ asset('storage/' . Auth::user()->userAccount->avatar) }}" alt="user" >
                       </div>

                    <!-- User profile text-->
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->userAccount->first_name . " " . Auth::user()->userAccount->last_name }}</a>
                        <div class="dropdown-menu animated flipInY">
                            <a  href="{!! route('admins.show', ['id'=> Auth::user()->id]) !!}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">NAVIGATION</li>
                        <li>
                            <li><a href="/"><i class="mdi mdi-gauge"></i>Dashboard</a></li>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Administrators</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/admins">Administrators List</a></li>
                                <li><a href="/admin/admins/create">Add Administrator</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Clients</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/clients">Clients List</a></li>
                                <li><a href="/admin/clients/create">Add Client</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Conversations</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/conversations">Conversations</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                <!-- item-->
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
            </div>
            <!-- End Bottom points-->
        </aside>
