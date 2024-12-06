 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-light navbar-light">

         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="{{ asset('../../assets/dashboard/img/testimonial-1.jpg') }}" alt="" style="width: 40px; height: 40px;">
                 <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
             </div>
          
         </div>
         <div class="container-fluid">
             <div class="navbar-nav w-100">
                 <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                     <i class="fa fa-tachometer-alt me-2"></i> Dashboard
                 </a>
                 <a href="{{ route('departments.index') }}" class="nav-item nav-link {{ request()->routeIs('departments*') ? 'active' : '' }}">
                     <i class="fas fa-building me-2"></i> Departments
                 </a>
                 <a href="{{ route('employees.index') }}" class="nav-item nav-link {{ request()->routeIs('employees.*') ? 'active' : '' }}"">
                     <i class="fas fa-users me-2"></i> Employees
                 </a>
                 <a href="#" class="nav-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <i class="fas fa-sign-out me-2"></i> Logout
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>

             </div>
         </div>

     </nav>
 </div>
 <!-- Sidebar End -->