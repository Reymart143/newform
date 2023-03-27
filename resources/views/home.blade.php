<!DOCTYPE html>
<html lang="en">

<head>
    
    @if (Auth::user()->role == 1)
        <meta charset="utf-8">
        <title>Admin Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        
    @else
        <meta charset="utf-8">
        <title>User Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
    @endif

    <!-- Favicon -->
    <link href="/front/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/lib/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/front/css/style.css" rel="stylesheet">

    <!-- Font awesome icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>

<body>  
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        
        <!-- Spinner End -->
       
        <!-- Sidebar Start -->
        
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="{{ url('/home') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"></i>OBX Solutions</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="/front/img/user.jpg" alt="" style="width: 40px; height: 40px;">
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
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="{{ url('/home') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="/front/img/user.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ url('/profile') }} "class="dropdown-item">My Profile</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"
                                class="dropdown-item">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        
                        </div>
                    </div>
                </div>
            </nav>
            
            <!-- Navbar End -->

            @if (Auth::user()->role == 1)      
            <div class="container-fluid pt-4 px-4" >
                <div class="bg-secondary rounded-top p-4"> 
                    <div class="mb-3 mt-3"style="text-align: center;">
                        <div class="bgimg" style="">
                            <div class="topleft">
                              <p>Logo</p>
                            </div>
                            <div class="middle">
                              <h1>COMING SOON</h1>
                              <hr>
                              <p>35 days</p>
                            </div>
                            <div class="bottomleft">
                              <p>Some text</p>
                            </div>
                          </div>
                    </div>
                    <br>
                </div>
            </div>
            @else
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        @include('layouts.sidebar')
                        <div class="container-fluid pt-4 px-4" >
                            <div class="bg-secondary rounded-top p-4"> 
                                <div class="mb-3 mt-3"style="text-align: center;">
                                    <label style="color:#f5f5f5; font-weight:bold; font-size:22px;">User Dasboard Content Here!</label> 
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="{{ url('/home') }}">OBX Solutions</a>, All Right Reserved. 
                            <br><i class="fa-solid fa-location-dot"></i> VLC Tower One, Gran Via, Cagayan de Oro City, Misamis Oriental                           
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <i class="fa-regular fa-envelope"></i> info@obxsolution.com
                            <br><i class="fa-solid fa-business-time"></i> 09:00 am - 05:00 pm
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>

        <!-- Content End -->

        {{-- <!--MODAL FOR VIEWING START -->
        {{-- <div id="viewmodal" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <!--MODAL HEADER -->
                    <div class="modal-header" style="background-color: #EFF0F1;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px; padding-left:10mm; padding-right:10mm;">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;
                        color: #212121;
                        padding:20px 0;
                        font-weight: bolder;">User full details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <!--MODAL BODY-->
                    <div class="modal-body" style="padding:10px 40px;">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><label style="color:#000000;  
                                    font-size: 17px;
                                    font-weight: normal;">Fullname</label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 style="color:#ba1b1b;  
                                font-size: 17px;
                                font-weight: normal;">
                                    <p>{{ Auth::user()->name }}</p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><label style="color:#000000;  
                                    font-size: 17px;
                                    font-weight: normal;">Age</label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 style="color:#ba1b1b;  
                                font-size: 17px;
                                font-weight: normal;">
                                    <p>{{ Auth::user()->age }}</p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><label style="color:#000000;  
                                    font-size: 17px;
                                    font-weight: normal;">User Id</label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 style="color:#ba1b1b;  
                                font-size: 17px;
                                font-weight: normal;">
                                    <p>{{ Auth::user()->id }}</p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><label style="color:#000000;  
                                    font-size: 17px;
                                    font-weight: normal;">Username</label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 style="color:#ba1b1b;  
                                font-size: 17px;
                                font-weight: normal;">
                                    <p>{{ Auth::user()->username }}</p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><label style="color:#000000;  
                                    font-size: 17px;
                                    font-weight: normal;">Birthdate</label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 style="color:#ba1b1b;  
                                font-size: 17px;
                                font-weight: normal;">
                                    <p>{{ Auth::user()->birthdate }}</p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><label style="color:#000000;  
                                    font-size: 17px;
                                    font-weight: normal;">Bloodtype</label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 style="color:#ba1b1b;  
                                font-size: 17px;
                                font-weight: normal;">
                                    <p>{{ Auth::user()->bloodtype }}</p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><label style="color:#000000;  
                                    font-size: 17px;
                                    font-weight: normal;">Phone Number</label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 style="color:#ba1b1b;  
                                font-size: 17px;
                                font-weight: normal;>
                                    <p>{{ Auth::user()->number }}</p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><label style="color:#000000;  
                                    font-size: 17px;
                                    font-weight: normal;">Address</label></h4>
                            </div>
                            <div class="col-md-6">
                                <h4 style="color:#ba1b1b;  
                                font-size: 17px;
                                font-weight: normal;">
                                    <p>{{ Auth::user()->purok }},{{ Auth::user()->barangay }},{{ Auth::user()->municipality }},{{ Auth::user()->province }},{{ Auth::user()->region }}
                                    </p>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!--MODAL FOOTER (BUTTON)-->
                    <div class="modal-footer" style="background-color: #EFF0F1;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;padding:10px 40px; text-align: right;">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="display:inline-block;padding:10px 20px;background-color: red;font-size:17px;border:none;border-radius:5px;color:#bcf5e7;cursor:pointer;">Close</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <!--MODAL FOR ADD USER START-->
        {{-- <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Add New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span id="form_result"></span>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label for="birthdate" class="form-label">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate">
                            </div>
                            <div class="mb-3">
                                <label for="gender-container" class="form-label">Gender</label>
                                <div id="gender-container">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="male"
                                            value="male">
                                        <label class="form-check-label" for="gender">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="female"
                                            value="female" checked>
                                        <label class="form-check-label" for="gender">
                                            Female
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Phone Number</label>
                                <input type="string" class="form-control" id="number" name="number"
                                    placeholder="Enter your phone number">
                            </div>
                            <div class="mb-3">
                                <label for="bloodtype-container" class="form-label">Blood Type</label>
                                <div id="bloodtype-container">
                                    <select id="bloodtype" class="form-select" aria-label="Default select example">
                                        <option selected>Select BLoodtype</option>
                                        <option value="0">Type O</option>
                                        <option value="A">Type A</option>
                                        <option value="B">Type B</option>
                                        <option value="AB">Type AB</option>
                                    </select>
                                </div>

                            </div>

                            <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">Region</i>
                                    </span>
                                </div>
                                <select class="form-control" name="region" id="region" on="getProvince(this);"
                                    style="max-width: 45% !important; border:solid 1px #d9d8d9; border-radius: 3px;"
                                    onchange="getProvince(this);">
                                    @if ($region->count() > 0)
                                        @foreach ($region as $r)
                                            <option value="{{ $r->region }}">{{ $r->region }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">Province</i>
                                    </span>
                                </div>
                                <select name="province" class="form-control" id="province"
                                    style="max-width: 50% !important; border:solid 1px #d9d8d9; border-radius: 3px;"
                                    onchange="getMunicipality(this);">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">Municipality</i>
                                    </span>
                                </div>
                                <select name="municipality" class="form-control" id="municipality"
                                    style="max-width: 50% !important; border:solid 1px #d9d8d9; border-radius: 3px;">
                                    <option value=""></option>
                                </select>
                            </div>

                            <div class="input-group mt-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">Barangay</i>
                                    </span>
                                </div>
                                <input type="text" name="barangay" id="barangay" class="form-control p-2"
                                    placeholder="{{ __('Barangay') }}" value="{{ old('name') }}" required
                                    style="border:solid 1px #d9d8d9; border-radius: 3px;">
                            </div>

                            <div class="mb-3">
                                <i class="material-icons">purok </i>
                                <input type="text" class="form-control" id="purok" name="purok"
                                    placeholder="Enter your purok">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username">
                            </div>
                          
                        </div>
                        <input type="hidden" name="action" id="action" value="Add" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" name="submit-btn" id="submit-btn" value="Add"
                                class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 

        <!--MODAL FOR DELETE USER START-->
        {{-- <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}} 

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/front/lib/chart/chart.min.js"></script>
    <script src="/front/lib/easing/easing.min.js"></script>
    <script src="/front/lib/waypoints/waypoints.min.js"></script>
    <script src="/front/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/front/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/front/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="/front/lib/tables/js/jquery.dataTables.min.js"></script>
    <script src="/front/lib/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/front/lib/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Javascript -->
    <script src="/front/js/main.js"></script>

   {{-- <script src="../js/scripts.js"></script>  --}}
</body>

</html>
