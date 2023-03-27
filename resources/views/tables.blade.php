<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User Management</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

<!-- Favicon -->
<link href="/front/img/favicon.ico" rel="icon">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/gh/hosuaby/Leaflet.SmoothMarkerBouncing@v2.0.0/dist/bundle.js"
          crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>

<script src="https://cdn.jsdelivr.net/gh/hosuaby/Leaflet.SmoothMarkerBouncing@v2.0.0/dist/bundle.js" crossorigin="anonymous"></script>

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

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
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
                  <a href="{{ url('/home') }}" class="nav-item nav-link"><i class="fa-solid fa-house me-2"></i>Dashboard</a>
                  <a href="{{ url('/tables') }}" class="nav-item nav-link active"><i class="fa-solid fa-table me-2"></i>Table</a>
                  <a href="{{ url('/profile') }}" class="nav-item nav-link"><i class="fa-solid fa-user me-2"></i>Profile</a>
              </div>
          </nav>
        </div>

        <!-- Sidebar Start -->

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="{{url('/home')}}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="/front/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{Auth::user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{url('/profile')}} "class="dropdown-item">My Profile</a>


                            <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" class="dropdown-item">Log Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                      
                        <div class="rounded h-100 p-4" style="background-color:#f5f5f5;">
                            <h6 class="mb-4 mt-3" style="color:rgb(24, 21, 21); font-size:30px; text-align:center;">List of members</h6>
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered" id="user_datatable" style="color:#000000;">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Full name</th>
                                        <th>Age</th>
                                        <th>Phone Number</th>
                                        <th>Gender</th>
                                        <th>Region</th>
                                        <th>Province</th>
                                        <th>Municipality</th>
                                        <th>Barangay</th>
                                        <th>purok</th>
                                        <th>Coordinates</th>
                                        <th width="400px" style="text-align: center;">Action</th>
                                        <th><button type="button" name="bulk_delete" id="bulk_delete"
                                        class="btn btn-primary btn-xs" style="padding-left: 5mm; padding-right: 5mm"><i class="fa-solid fa-trash-can"></i></button></th>
                                    </tr>
                                </thead>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">OBX Solutions</a>, All Right Reserved. 
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

        <!--MODAL FOR VIEWING START -->
        {{-- <div id="viewmodal" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="font-family: sans-serif;
                width:550px;
                margin:30px auto;
                background-color: #f5f5f5;
                border-radius: 10px;
                color:#000000;">

                    <!--MODAL HEADER -->
                    <div class="modal-header" style="background-color: #EFF0F1;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px; padding-left:10mm; padding-right:10mm;">
                        <h5 class="modal-label" id="exampleModalLongTitle" style="font-size: 30px;
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
                                <h4 class="font-normal"style="color:#ba1b1b;  
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
                                font-weight: normal;">
                                    <p>{{ Auth::user()->number }}</p>
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 ><label style="color:#000000;  
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="  display:inline-block;padding:10px 20px;background-color: red;font-size:17px;border:none;border-radius:5px;color:#bcf5e7;cursor:pointer;">Close</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <!--MODAL FOR ADD USER START-->
        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true" style="magin-right: -10px" >
            <div class="modal-dialog">
                <div class="modal-content"style="width: 1030px !important; margin-right: 100%; ">
                    <form class="modal-form-view" style="width: 1030px !important;">
                        @csrf
                        <div class="modal-header" >
                            <h5 class="modal-title"style="color:#000" id="ModalLabel">Add New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span id="form_result"></span>
                            
                            <table>
                                <tr>
                                    <td>
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
                                    
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">Region</i>
                                                </span>
                                            </div>
                                            <select class="form-control" name="region" id="region" on="getProvince(this);"
                                            style="max-width: 45% !important; border:solid 1px #d9d8d9; border-radius: 3px;"
                                        onchange="getProvince(this);">
                                            <option value="Region I">Region I</option>
                                            <option value="Region II">Region II</option>
                                            <option value="Region III">Region III</option>
                                            <option value="Region IV-A">Region IV-A</option>
                                            <option value="Region VI-B">Region IV-B</option>
                                            <option value="Region V">Region V</option>
                                            <option value="Region VI">Region VI</option>
                                            <option value="Region VII">Region VII</option>
                                            <option value="Region VIII">Region VIII</option>
                                            <option value="Region IX">Region IX</option>
                                            <option value="Region X">Region X</option>
                                            <option value="Region XI">Region XI</option>
                                            <option value="Region XII">Region XII</option>
                                            <option value="Region XIII">Region XIII</option>
                                            <option value="BARMM">BARMM</option>
                                            <option value="CAR">CAR</option>
                                            <option value="NCR">NCR</option>
                                            {{--@if ($regions->count() > 0)
                                                @foreach ($regions as $r)
                                                    <option value="{{ $r->region }}">{{ $r->region }}</option>
                                                @endforeach
                                            @endif--}}
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
                                            <input type="text" class="form-control" id="purok" name="purok"
                                                placeholder="Enter your purok">
                                        </div>
                                                    <!--Coordinates-->
                                        <input type="text" name="location" id="location" class="form-control p-2" placeholder="{{ __('latitude / longitude') }}" value="{{ old('name') }}" required style="border:solid 1px #d9d8d9; border-radius: 3px;" onchange="checkInput();"> 
                                    
                                        <div>
                                        <label style="font-style: italic; font-size: 11px; margin-left: 10px; color: #08288b;">Example: 8.42938,124.618446</label>
                                        </div>

                                    


                                    
                                    
                                        <input type="hidden" name="action" id="action" value="Add" />
                                        <input type="hidden" name="hidden_id" id="hidden_id" />
                                    </td>
                                    <td>
                                        <!--MAP-->
                                        <div class="col-md-6 ml-auto mr-auto">
                                            <div id="map" style="vertical-align:top; height: 650px; float:left;
                                           width: 600px; margin-right: 10px; margin-left: 20mm; top:-15px; border: 1px solid #000;"></div>
                                          </div>
                                    </td>
                                </tr>
                            </table>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" name="submit-btn" id="submit-btn" value="Add"
                                class="btn btn-info">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--MODAL FOR DELETE USER START-->
        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="modal-form-delete">
                        <div class="modal-header">
                            <h5 class="modal-label" id="ModalLabel" style="color:#000000;">Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4 align="center" style="margin:0; color:#000000;">Are you sure you want to remove this data?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/front/lib/tables/js/jquery.dataTables.min.js"></script>
    <script src="/front/lib/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/front/lib/tables/js/datatable-init/datatable-basic.min.js"></script>

    <!-- Template Javascript -->
    <script src="/front/js/main.js"></script>

    {{-- Search Location --}}
    <script>
        // Creating map options
        var mapOptions = {
          center: [8.454641620475954, 124.62330811173518],
          zoom: 10
        }
  
        // Creating a map object
        var map = new L.map('map', mapOptions);
  
        // Creating a Layer object
        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
  
        // Adding layer to the map
        map.addLayer(layer);
  
  
        /*
        // Creating a Marker
        var markerOptions = {
        title: "MyLocation",
        clickable: true,
        draggable: true
        }
        // Creating a marker
        var marker = L.marker([17.385044, 78.486671], markerOptions);
              
        // Adding marker to the map
        marker.addTo(map);
        // Icon options
        var iconOptions = {
        iconUrl: 'logo.png',
        iconSize: [50, 50]
        }
  
        // Creating a custom icon
        var customIcon = L.icon(iconOptions);
        // Creating a Marker
        var marker = L.marker([17.438139, 78.395830], markerOptions);
        // Icon options
        var iconOptions = {
                iconUrl: 'logo.png',
                iconSize: [50, 50]
              }
              // Creating a custom icon
              var customIcon = L.icon(iconOptions);
              
              // Creating Marker Options
              var markerOptions = {
                title: "MyLocation",
                clickable: true,
                draggable: true,
                icon: customIcon
              }        
        
        // Adding marker to the map
        marker.addTo(map);
        // Creating latlng object
  
        var latlngs = [
                [17.385044, 78.486671],
                [16.506174, 80.648015],
                [17.000538, 81.804034],
                [17.686816, 83.218482]
              ];
              // Creating a poly line
              var polyline = L.polyline(latlngs, {color: 'red'});
              
              // Adding to poly line to map
              polyline.addTo(map); 
              var rectOptions = {color: 'Red', weight: 1}   // Creating rectOptions
            
            // Creating a rectangle
            var rectangle = L.rectangle(latlngs, rectOptions);
            rectangle.addTo(map);   // Adding to rectangle to map
            */
  
        function addr_search()
        {
  
        var r = $('#region').val();
        var p = $('#province').val();
        var m = $('#municipality').val();
        var b = $("#barangay").val();
  
        var xmlhttp = new XMLHttpRequest();
        var url="https://nominatim.openstreetmap.org/search?q="+b+","+m+","+p+","+r+"&format=json&polygon_geojson=1&addressdetails=1";
        xmlhttp.onreadystatechange = function()
        {
          if (this.readyState == 4 && this.status == 200)
          {
            var myArr = JSON.parse(this.responseText);
            searchLocation(myArr);
          }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        }
  
        function addr_search_municipal()
        {
  
        var r = $('#region').val();
        var p = $('#province').val();
        var m = $('#municipality').val();
        var b = $("#barangay").val();
  
        //alert(r+"\r\n"+p+"\r\n"+m+"\r\n"+b);
  
        var xmlhttp = new XMLHttpRequest();
        var url="https://nominatim.openstreetmap.org/search?q="+m+","+p+","+r+"&format=json&polygon_geojson=1&addressdetails=1";
        xmlhttp.onreadystatechange = function()
        {
          if (this.readyState == 4 && this.status == 200)
          {
            var myArr = JSON.parse(this.responseText);
            searchLocation(myArr);
          }
        };
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
        }
  
        function searchLocation(arr){
        var out = "<br />";
        var i;
  
        if(arr.length > 0)
        {
          for(i = 0; i < arr.length; i++)
          {
            chooseAddr(arr[0].lat, arr[0].lon);
            lat=arr[0].lat;
            lon=arr[0].lon;
          }
  
          $('#location').val(lat+','+lon);
        }else{
          Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Not found!',
                        text: 'No result found, trying to search your municipality!',
                        showConfirmButton: false,
                        timer: 2500
                      });
          addr_search_municipal();
        }
        
        }
  
        function chooseAddr(lat1, lng1)
        {       
        var pointIcon = L.Icon.extend({
            options: {
                iconSize:     [25, 40],
                iconAnchor:   [0, 0],
                popupAnchor:  [8, 0],
              }
          });
  
              map.setView([lat1, lng1],13);
  
              try{
                if (lMarker !== null) {
                    map.removeLayer(lMarker);
                }
              }catch (ex){
  
              }
  
              
              lMarker = L.marker([lat1, lng1], {icon: startIcon}).bindPopup("<b>"+lat1+","+lng1+"</b>").addTo(map).bounce(5);
              map.addLayer(lMarker);
  
        }
  
        var grnIcon = L.Icon.extend({
                options: {
                      iconSize:     [15, 20],
                      iconAnchor:   [0, 0],
                      popupAnchor:  [8, 0]
                  }
              });
  
  
              var startIcon = new grnIcon({iconUrl: 'https://www.google.com/maps/vt/icon/name=assets/icons/poi/tactile/pinlet_shadow_v3-2-medium.png,assets/icons/poi/tactile/pinlet_outline_v3-2-medium.png,assets/icons/poi/tactile/pinlet_v3-2-medium.png,assets/icons/poi/quantum/pinlet/dot_pinlet-2-medium.png&highlight=ff000000,ffffff,34a853,ffffff?scale=1.25'});
              
  
        var popup = L.popup();
              var tmploc='';
  
  
              function onMapClick(e) {
              popup
              .setLatLng(e.latlng)
              .setContent(e.latlng.toString())
              .openOn(map);
              tmploc=e.latlng.toString();
  
              var getloc = tmploc.split("(");
              var coor = getloc[1].split(")");
              var ltlng = coor[0].split(",");
  
              try{
                  if (lMarker !== null) {
                      map.removeLayer(lMarker);
                  }
                }catch (ex){
  
                }
  
              lMarker = L.marker([ltlng[0].trim(), ltlng[1].trim()], {icon: startIcon}).bindPopup("<b>"+ltlng[0].trim()+","+ltlng[1].trim()+"</b>").addTo(map).bounce(5);
              
              $('#location').val(ltlng[0].trim()+","+ltlng[1].trim());
  
              fetch("https://nominatim.openstreetmap.org/search.php?q="+ltlng[0]+","+ltlng[1]+"&polygon_geojson=1&format=json")
                    .then(response => response.json())
                    .then(j => {
  
                      var brgy = j[0].display_name.split(",");
  
                      try{
                        $('#barangay').val(brgy[0]+","+brgy[1])
                      }catch(e){
  
                      }
                })
            }
  
            
            map.on('click', onMapClick);
  
        document.querySelector('input#location').oninput = checkInput;
  
        function checkInput()
        {
          var clean = this.value.replace(/[^0-9,.]/g, "")
                              .replace(/(,.*?),(.*,)?/, "$1");
        
  
            Swal.fire({
                  position: 'center',
                  icon: 'error',
                  title: 'Invalid Coordinates!',
                  html: '<span style="color: #df0000; font-weight:bold;">You have enter invalid Coordinates location</span><br/><br/><span style="color: #df0000;">This is an example:</span> <span style="color: #08288B;"> 8.42938,124.618446</span><br/><br/><span style="color: #08288B;">If you are familiar of the home place of a member, you can click it on the Map and the exact coordinates will automatically place on this input box.</span>',
                  showConfirmButton: true,
              });
  
        }
    </script>
 
    {{-- SWAL Sign In --}}
    <script>const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'success',
        title: 'Signed in successfully'
      })
      </script>
    
    {{-- Address REGPROVMUN --}}
   <script>
    function getProvince(pl){
          var reg = (pl.value || pl.options[pl.selectedIndex].value);
  
          $.ajax({
                  url: "{{ url('/province-list/provinces') }}/"+reg,
                  context: document.body,
                  success: function(data){
                    console.log(data);
  
                      $('#province').find('option').remove();
                      $.each(data.data, function(key, value) {
                              
                              $('#province').append(`<option value="${value.province}">${value.province}</option>`);
                          
                      });
  
  
                      var e = document.getElementById("province");
                      var strProvince = e.value;
  
                      $.ajax({
                          url: "{{ url('/municipalities-list/municipality') }}/"+strProvince,
                          context: document.body,
                          success: function(mun){
                              console.log(mun);
                              $('#municipality').find('option').remove();
                              $.each(mun.data, function(key, value) {
                                      
                                      $('#municipality').append(`<option value="${value.municipality}">${value.municipality}</option>`);
                                      
                                  
                              });
                          }
  
                          
                      });
                
                  }
  
          });
      };
  
      function getMunicipality(pl){
          var prov = (pl.value || pl.options[pl.selectedIndex].value);
  
          $.ajax({
                  url: "{{ url('/municipalities-list/municipality') }}/"+prov,
                  context: document.body,
                  success: function(data){
                    console.log(data);
  
                      $('#municipality').find('option').remove();
                      $.each(data.data, function(key, value) {
                              
                              $('#municipality').append(`<option value="${value.municipality}">${value.municipality}</option>`);
                      });
                      setTimeout(addr_search, 1500);
                  }
          });
      };
  
      $(function () {
          $("select#region").change();
      });

   </script>

    {{-- DATATABLES --}}
    <script>
        var table = $('#user_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",

            columns: [{
                    data: 'image',
                    name: 'image',
                    render: function(data, type, row) {
                        var image = '<img src="{{ asset('storage/:image') }}" alt class="w-75 square  "/>';
                        image = image.replace(':image', data);
                        return image;
                    }
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'age',
                    name: 'age'
                },
                {
                    data: 'number',
                    name: 'number'
                },
                {
                    data: 'gender',
                    name: 'gender   '
                },
                {
                    data: 'region',
                    name: 'region'
                },

                {
                    data: 'province',
                    name: 'province'
                },
                {
                    data: 'municipality',
                    name: 'municipality'
                },
                {
                    data: 'barangay',
                    name: 'barangay'
                },
                {
                    data: 'purok',
                    name: 'purok'
                },
                
                {
                    data: 'location',
                    name: 'location'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searchable: false
                },

            ]
        });

        $('#create_record').click(function() {
            $('.modal-title').text('Add New User');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result').html('');

            $('#formModal').modal('show');
            $('#submit-btn').text('Create User')


        })

        $(document).on('click', '.edit', function(event) {

            event.preventDefault();
            var id = $(this).attr('id');


            $('#form_result').html('');
            $('#submit-btn').text('Update User')

            $.ajax({
                url: "/users/edit/" + id + "/",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(data) {
                    $('#name').val(data.result.name);
                  
                    $('#number').val(data.result.number);
                    $('#birthdate').val(data.result.birthdate);
                 
                    // $('#region').val(data.result.region);
                    $('#region')
                        .val(data.result.region)
                        .trigger('change');
                    setTimeout(
                        function() {
                            $('#province')
                                .val(data.result.province)
                                .trigger('change');
                        }, 500);
                    setTimeout(
                        function() {

                            $('#municipality')
                                .val('Santa Monica')
                                .trigger('change');
                        });
                    // $('#province')
                    // .val('Antique')
                    // .trigger('change');
                    // $('#municipality')
                    // .val(data.result.municipality)
                    // .trigger('change');
                    $('#barangay').val(data.result.barangay);
                    $('#location').val(data.result.location);
                    $('#purok').val(data.result.purok);
                    $('#hidden_id').val(id);
                    $('.modal-title').text('Edit data');
                    $('#submit-btn').val('Update');
                    $('#action').val('Edit');
                    $('#formModal').modal('show');
                },
                error: function(data) {
                    var errors = data.responseJSON;
                }
            })
        });


        var user_id;
        $(document).on('click', '.delete', function() {
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');

        });
        // $(document).on('click', '.view', function() {
        //     user_id = $(this).attr('id');
        //     $('#viewmodal').modal('show');
     
            

        // });

        $('#ok_button').click(function() {
            $.ajax({
                url: "users/destroy/" + user_id,
                beforeSend: function() {
                    $('#ok_button').text('Deleting...');
                },
                success: function(data) {
                    
                    $('#confirmModal').modal('hide');
                    $('#user_datatable').DataTable().ajax.reload();
             
                                    
                }
            })
        });

        $(document).on('click', '#bulk_delete', function() {
            var id = [];
            if (confirm( "Are you sure you want to Delete this data?")) {
                $('.users_checkbox:checked').each(function() {
                    id.push($(this).val());
                });
                if (id.length > 0) {
                    $.ajax({
                        url: "{{ route('users.removeall') }}",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "get",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $('#user_datatable').DataTable().ajax.reload();
                            Swal.fire(
                            'Removed Successfully',
                            'data deleted',
                            'success'
            )
                        },
                        error: function(data) {
                            var errors = data.responseJSON;
                        }
                    });
                } else {
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select atleast one checkbox!',
                    footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            }
        });


        $('#submit-btn').on('click', function(e) {
            var currentYear = new Date();
            var selectedDate = new Date($('#birthdate').val());
            var current_Year = currentYear.getFullYear();
            var selected_Date = selectedDate.getFullYear();
            var age = current_Year - selected_Date;

            var userform = {

                'id': $('#hidden_id').val(),
                'name': $('#name').val(),
                'birthdate': $('#birthdate').val(),
                'gender': $('input[name="gender"]:checked').val(),
                'number': $('#number').val(),
                'age': age,
                'bloodtype': $('#bloodtype').val(),
                'region': $('#region').val(),
                'province': $('#province').val(),
                'municipality': $('#municipality').val(),
                'barangay': $('#barangay').val(),
                'purok': $('#purok').val(),
                'username': $('#username').val(),
                'password': $('#password').val(),
                'password_confirmation': $('#password_confirmation').val(),
                'image': $('.image-tag').val(),
                'location': $('#location').val()
            }

            if ($(this).val() == 'Update') {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: 'users/update',
                    data: userform,
                    dataType: 'json',
                    success: function(response) {
                       
                        $('#user_datatable').DataTable().ajax.reload();
                        Swal.fire(
                        'Successfully Updated!',
                        'Good job!',
                       
                        )
                    }
                })
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: 'create',
                    data: userform,
                    dataType: 'json',
                    success: function(response) {
                        $('#user_datatable').DataTable().ajax.reload();
                        alert(response.message)

                    }
                })
            }

        })
    </script>

</body>

</html>