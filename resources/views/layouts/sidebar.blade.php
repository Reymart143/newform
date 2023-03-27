
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ url('/home') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"></i>OBX Solutions</h3>
        </a> 
      @if(Auth::user()->role == 1)
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div> 
     
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            
            <a href="{{ url('/home') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ url('/tables') }}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Table</a>
            <a href="{{ url('/profile') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Profile</a>
        </div>
        @else
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="/front/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div> 
     
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>User</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ url('/home') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Dashboard</a>
            <a href="{{ url('/user') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Profile</a>
        </div>
    </nav>
</div>
@endif