
<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('assets/img/brand/BlueBeeEV.png')}}" class="navbar-brand-img" alt="...">
         </a>  
          <!-- {{ config('app.name', 'BeeEV') }} -->
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
            @if ( auth()->user()->role->id == 1)
  <a class="nav-link active" href="{{route('admin.dashboard')}}">
  @endif
  @if ( auth()->user()->role->id == 2)
  <a class="nav-link active" href="{{route('subadmin.dashboard')}}">
  @endif
  @if ( auth()->user()->role->id == 3)
  <a class="nav-link active" href="{{route('agent.dashboard')}}">
  @endif
   <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            @if ( auth()->user()->role->id == 1)
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.user.index')}}">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">User</span>
              </a>
            </li>
            @endif

            <!-- <li class="nav-item">
              <a class="nav-link" href="icons.html">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Icons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="map.html">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Google</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.html">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tables.html">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.html">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Register</span>
              </a>
            </li> -->
           
          </ul>

 
          <!-- Divider -->
        <hr class="my-2">
         @if ( (auth()->user()->role->id == 1) || ( auth()->user()->role->id == 2))
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media ">
                  
                  <div class="media-body  ml-2  d-none d-lg-block"> 
                    <i class="ni ni-settings-gear-65 text-info"></i>
                    <span class="mb-0 text-sm  font-weight-bold ">System Setting</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
              <a class="nav-link" href="{{route('admin.role.index')}}" >
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Role</span>
              </a>
              <a class="nav-link" href="{{route('admin.brand.index')}}" >
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Brand</span>
              </a>
              <a class="nav-link" href="{{route('admin.vehicletype.index')}}" >
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Vehicle Type</span>
              </a>
              <a class="nav-link" href="{{route('admin.modeltype.index')}}" >
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Model Type</span>
              </a>
              <a class="nav-link" href="{{route('admin.company.index')}}">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Company</span>
              </a>
            
              <a class="nav-link" href="{{route('admin.country.index')}}"" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Countries</span>
              </a>
              <a class="nav-link" href="{{route('admin.state.index')}}" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">State</span>
              </a>
              <a class="nav-link" href="{{route('admin.city.index')}}" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">City</span>
              </a>
              <a class="nav-link" href="{{route('admin.chargertype.index')}}" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Charger type</span>
              </a>
              <a class="nav-link" href="{{route('admin.automatedstatus.index')}}" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Automated type</span>
              </a>
              <a class="nav-link" href="{{route('admin.amenities.index')}}" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Amenities</span>
              </a>
              </div>
            </li>
          </ul>
           @endif
  <!-- Divider -->
  <hr class="my-2">
         @if ( (auth()->user()->role->id == 1)|| ( auth()->user()->role->id == 2))
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media ">
                  
                  <div class="media-body  ml-2  d-none d-lg-block"> 
                    <i class="ni ni-single-02 text-yellow"></i>
                    <span class="mb-0 text-sm  font-weight-bold ">User</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
              <a class="nav-link" href="{{route('admin.role.index')}}" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Role</span>
              </a>
             
              </div>
            </li>
          </ul>
           @endif

  <!-- Divider -->
  <hr class="my-2">
         @if ( (auth()->user()->role->id == 1)|| ( auth()->user()->role->id == 2))
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media ">
                  
                  <div class="media-body  ml-2  d-none d-lg-block"> 
                    <i class="ni ni-planet text-yellow"></i>
                    <span class="mb-0 text-sm  font-weight-bold ">Charging Station</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
              <a class="nav-link" href="{{route('admin.chargingstations.index')}}" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Charging Station</span>
              </a>
             
              </div>
            </li>
          </ul>
           @endif
<!-- Divider -->
<hr class="my-2">
         @if ( (auth()->user()->role->id == 1)|| ( auth()->user()->role->id == 2))
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media ">
                  
                  <div class="media-body  ml-2  d-none d-lg-block"> 
                    <i class="ni ni-planet text-yellow"></i>
                    <span class="mb-0 text-sm  font-weight-bold ">Connector</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
              <a class="nav-link" href="{{route('admin.connectortype.index')}}" target="_blank">
                <i class="ni ni-spaceship text-blue"></i>
                <span class="nav-link-text">Connector</span>
              </a>
             
              </div>
            </li>
          </ul>
           @endif

<!-- Divider -->
<hr class="my-2">
         @if ( (auth()->user()->role->id == 1)|| ( auth()->user()->role->id == 2))
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media ">
                  
                  <div class="media-body  ml-2  d-none d-lg-block"> 
                    <i class="ni ni-tag text-yellow"></i>
                    <span class="mb-0 text-sm  font-weight-bold ">Offer Management</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
              <a class="nav-link" href="{{route('admin.evstation.index')}}" target="_blank">
                <i class="ni ni-tag text-yellow"></i>
                <span class="nav-link-text">Offer</span>
              </a>
             
              </div>
            </li>
          </ul>
           @endif


           </div>
      </div>
    </div>
  </nav>