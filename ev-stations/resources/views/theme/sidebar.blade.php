



<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">BrainyDx<sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
@if ( auth()->user()->role->id == 1)
  <a class="nav-link" href="{{route('admin.dashboard')}}">
  @endif
  @if ( auth()->user()->role->id == 2)
  <a class="nav-link" href="{{route('subadmin.dashboard')}}">
  @endif
  @if ( auth()->user()->role->id == 3)
  <a class="nav-link" href="{{route('agent.dashboard')}}">
  @endif
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>
@if ( auth()->user()->role->id == 1)
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-user"></i>
    <span>User</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">User Management</h6>
      <a class="collapse-item" href="{{route('admin.user.index')}}">User</a>
    </div>
  </div>
</li> 

                @endif

                @if ( auth()->user()->role->id == 1)
<!-- Nav Item - Pages Collapse Menu -->
  {{-- <li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwos" aria-expanded="true" aria-controls="collapseTwos">
    <i class="fas fa-fw fa-cog"></i>
    <span>Employee</span>
  </a>
  <div id="collapseTwos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Employee Management</h6>
      <a class="collapse-item" href="{{route('admin.user.index')}}">User</a>
<!-- 
      <a class="collapse-item" href="buttons.html">Buttons</a>
      <a class="collapse-item" href="cards.html">Cards</a> -->
    </div>
  </div>
</li>  --}}
@endif
               
                @if ( auth()->user()->role->id == 1)
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-desktop"></i>
    <span>System management</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">System management:</h6>
      <a class="collapse-item" href="{{route('admin.role.index')}}">Role</a>
     <a class="collapse-item" href="{{route('admin.company.index')}}">Company</a>
      <a class="collapse-item" href="{{route('admin.country.index')}}">Country</a>
      <a class="collapse-item" href="{{route('admin.state.index')}}">State</a>
      <a class="collapse-item" href="{{route('admin.city.index')}}">City</a>
      <a class="collapse-item" href="{{route('admin.chargertype.index')}}">Charger Type</a>
      <a class="collapse-item" href="{{route('admin.automatedstatus.index')}}">Automated Type</a>

      <!-- <a class="collapse-item" href="#">Shift</a> -->

    </div>
  </div>
</li>
@endif

<hr class="sidebar-divider">


<!-- Divider -->

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities_ev_station" aria-expanded="true" aria-controls="collapseUtilities_event">
    <i class="fas fa-fw fa-life-ring"></i>
    <span>EV Management</span>
  </a>
  <div id="collapseUtilities_ev_station" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">EV Station</h6>
     
      @if ( auth()->user()->role->id == 1)
      <a class="collapse-item" href="{{route('admin.evstation.index')}}">EV Station</a>
      @endif
      @if ( auth()->user()->role->id == 2)
      <a class="collapse-item" href="{{route('admin.evstation.index')}}">EV Station</a>
      @endif
      <!-- <a class="collapse-item"  href="{{route('admin.evstation.index')}}"> EV</a> -->
    

    </div>
  </div>
</li>

<!-- ######### -->

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities_leave" aria-expanded="true" aria-controls="collapseUtilities_leave">
    <i class="fas fa-fw fa-share"></i>
    <span>Connector Management</span>
  </a>
  <div id="collapseUtilities_leave" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Connector Management:</h6>
      @if ( auth()->user()->role->id == 2)
      @can('isEmployee')
      <a class="collapse-item" href="#">Apply Connector</a>
      @endcan
      @endif
      <a class="collapse-item"  href="#">Connector list</a>
      <a class="collapse-item"  href="#">Leave Calender</a>

      {{--  <a class="collapse-item" href="#">Total leave list</a>
      <a class="collapse-item" href="#">City</a>
      <a class="collapse-item" href="#">Shift</a>--}}

    </div>
  </div>
</li>




<hr class="sidebar-divider">


<!-- Divider -->

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities_event" aria-expanded="true" aria-controls="collapseUtilities_event">
    <i class="fas fa-fw fa-life-ring"></i>
    <span>Event Management</span>
  </a>
  <div id="collapseUtilities_event" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Connector Management:</h6>
      @if ( auth()->user()->role->id == 1)
      @can('isAdmin')
      <a class="collapse-item" href="#">Create Connector </a>
      @endcan
      @endif
      <a class="collapse-item"  href="#"> Connector</a>
    

    </div>
  </div>
</li>
<hr class="sidebar-divider">
@if ( auth()->user()->role->id == 1)
@can('isAdmin')

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities_pay" aria-expanded="true" aria-controls="collapseUtilities_pay">
    <i class="fas fa-fw fa-inr"></i>
    <span>Offer management</span>
  </a>
  <div id="collapseUtilities_pay" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Offer management:</h6>


      <a class="collapse-item" href="#">Offer list</a>
    

    </div>
  </div>
</li>
@endcan
@endif

<!-- Heading -->
<!-- <div class="sidebar-heading">
  Addons
</div>

 Nav Item - Pages Collapse Menu 
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Login Screens:</h6>
      <a class="collapse-item" href="login.html">Login</a>
      <a class="collapse-item" href="register.html">Register</a>
      <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
      <div class="collapse-divider"></div>
      <h6 class="collapse-header">Other Pages:</h6>
      <a class="collapse-item" href="404.html">404 Page</a>
      <a class="collapse-item" href="blank.html">Blank Page</a>
    </div>
  </div>
</li> -->

<!-- Nav Item - Charts -->
<!-- <li class="nav-item">
  <a class="nav-link" href="charts.html">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Charts</span></a>
</li> -->

<!-- Nav Item - Tables -->
<!-- <li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fas fa-fw fa-table"></i>
    <span>Calendar</span></a>
</li> -->

{{--<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fas fa-fw fa-table"></i>
    <span>Calendar</span></a>
</li>--}}

<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fas fa-fw fa-table"></i>
    <span>Offer</span></a>
</li>

{{--<li class="nav-item">
  <a class="nav-link" href="#">
    <i class="fas fa-fw fa-table"></i>
    <span>Downloads</span></a>
</li>--}}


<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settings" aria-expanded="true" aria-controls="settings">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Settings</span>
  </a>
  <div id="settings" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Settings:</h6>
    

      <a class="collapse-item" href="#"> My profile</a>
          <a class="collapse-item" href="#">Change Password</a>
          {{--   <a class="collapse-item" href="#"> Manage salary details</a>
      <a class="collapse-item" href="#">Make payment </a>
      <a class="collapse-item" href="#"> Generate payslip </a> --}}

    </div>
  </div>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->                       