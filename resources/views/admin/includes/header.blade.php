        <header class="header" id="header">
            <div class="page-brand">
                <a class="link" href="{{url('/')}}">
                    <span class="brand">Home Solution BD
                          
                    </span>
                <span class="brand-mini">HSBD</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        <form class="navbar-search" action="javascript:;">
                            <div class="rel">
                                <span class="search-icon"><i class="ti-search"></i></span>
                                <input class="form-control" placeholder="Search here...">
                            </div>
                        </form>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                   
                    
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            
                        <span>{{Session('email')}}<i class="fa fa-angle-down m-l-5"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- <a class="dropdown-item" href="profile.html"><i class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="profile.html"><i class="fa fa-cog"></i>Settings</a>
                            <a class="dropdown-item" href="javascript:;"><i class="fa fa-support"></i>Support</a> --}}
                            {{-- <li class="dropdown-divider"></li> --}}
                            {{-- <a class="dropdown-item"href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="fa fa-power-off"></i> Logout
                            </a>    
                            <form id="frm-logout" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form> --}}
                            <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-power-off"></i>Logout</a> 
                            
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>