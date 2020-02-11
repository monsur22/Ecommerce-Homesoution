        <header class="header" id="header">
            <div class="page-brand">
                <a class="link" href="{{url('/')}}">
                    <span class="brand">E-Commerce
                   
                    </span>
                    <span class="brand-mini">PG</span>
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

                <ul class="nav navbar-toolbar">
                   
                    
                    <li class="dropdown dropdown-user">
                        <i class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            
       
                        <span>{{Session('firstname')}} &nbsp {{Session('lastname')}}<i class="fa fa-angle-down m-l-5"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">

                            <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-support"></i>Logout</a> 
                  
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>