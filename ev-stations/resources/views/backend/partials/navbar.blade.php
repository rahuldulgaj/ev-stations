    <nav class="navbar">
        <div class="container-fluid">

            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ route('dashboard') }}">EV Stations</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true">
                    <i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                   
                <li >
                <a href="{{ route('register') }}"><i class="material-icons">person_add</i> 
                 <span >Register</span>
                  </a></li>
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">Count Messages</span>
                        </a>
                       
                        <ul class="dropdown-menu">
                            <li class="header">MESSAGES</li>
                            <li class="body">
                                <ul class="menu">
                                  
                                </ul>
                            </li>
                          

                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <img src="{{Storage::url('users/'.auth()->user()->image)}}" alt="{{ auth()->user()->name }}" width="24" height="24">
                            <span class="label uppercase">{{ strtok(Auth::user()->name, " ") }}</span>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{route('profile')}}"><i class="material-icons">person</i>Profile</a>
                            </li>

                            <li role="seperator" class="divider"></li>
                            <li>
                                <a href="#"><i class="material-icons">message</i>Messages</a>
                            </li>
                            <li>
                                <a href="{{ route('changepassword') }}"><i class="material-icons">lock</i>Password</a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}" target="_blank"><i class="material-icons">home</i>Visit Site</a>
                            </li>
                            <li role="seperator" class="divider"></li>

                            <li>
                                <a class="dropdownitem" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="material-icons">input</i> {{ __('Sign Out') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>