<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/front/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/front/css/style.css" rel="stylesheet">

    <!-- Font awesome icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">OBX Solutions</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class ="rounded-circle" src="/front/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{Auth::user()->name}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{url('/home')}}" class="nav-item nav-link"><i class="fa-solid fa-house me-2"></i>Dashboard</a>
                    <a href="{{url('/tables')}}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="{{url('/profile')}}" class="nav-item nav-link active"><i class="fa-solid fa-user me-2"></i>Profile</a>
                </div>
            </nav>
        </div>
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

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="container">
                        <div class="main-body">
                            <div class="row gutters-sm">
                                
                                {{-- LEFT CARDS --}}
                                <div class="col-md-6 mb-5">
                                
                                {{-- ADMIN PROFILE --}}
                                <div class="card">
                                    <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <div class="text-center">
                                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                                            <input type="file" class="text-center center-block file-upload mt-2" style="margin-left: 27mm;">
                                        </div>
                                        <div class="mt-3">  
                                        <p class="text-secondary mb-1">{{Auth::user()->name}}</p>
                                        <p class="text-muted font-size-sm">Admin</p>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                {{-- ADMIN SIDE ADDRESS PANEL --}}
                                <div class="card mt-3">
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0" style="color: black;"><i class="fa-solid fa-location-dot me-2"></i>Region</h6>
                                        <span class="text-secondary">{{Auth::user()->region}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0" style="color: black;"><i class="fa-solid fa-location-dot me-2"></i>Province</h6>
                                        <span class="text-secondary">{{Auth::user()->province}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0" style="color: black;"><i class="fa-solid fa-location-dot me-2"></i>City</h6>
                                        <span class="text-secondary">{{Auth::user()->municipality}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0" style="color: black;"><i class="fa-solid fa-location-dot me-2"></i>Barangay</h6>
                                        <span class="text-secondary">{{Auth::user()->barangay}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0" style="color: black;"><i class="fa-solid fa-location-dot me-2"></i>Purok</h6>
                                        <span class="text-secondary">{{Auth::user()->purok}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <h6 class="mb-0" style="color: black;"><i class="fa-solid fa-location-dot me-2"></i>Coordinates</h6>
                                        <span class="text-secondary">{{Auth::user()->location}}</span>
                                    </li>
                                    </ul>
                                </div>
                                </div>

                                {{-- RIGHT CARD --}}
                                <div class="col-md-6">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="row">
                                                <h5 class="mb-3" style="color: rgb(244, 38, 38); padding-top:1mm; padding-left:3mm;">Personal Information</h5>        
                                                
                                                {{-- EDIT BUTTON --}}
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
                                                style="padding: 1mm; width:50px; position: absolute;top: 15px; right: 20px;"><i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                    
                                                {{-- MODAL FOR EDIT ADMIN INFO--}}
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content" style="font-family: sans-serif;">

                                                            {{-- MODAL HEADER --}}
                                                            <div class="modal-header" style="background-color: #d9d8d9;">
                                                                <h5 class="modal-title" style="color: black;" id="staticBackdropLabel">Edit Profile</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            {{-- MODAL HEADER --}}
                                                            <div class="modal-body" style="background-color:#f5f5f5;">
                                                                <span id="form_result"></span>
                                                                
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label" style="color: #ba1b1b; font-weight:bold;">Full Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name"
                                                                        placeholder="Enter your name" style="border:solid 1px #d9d8d9;">
                                                                </div>
                                                                        
                                                                <div class="mb-3">
                                                                    <label for="number" class="form-label" style="color: #ba1b1b;font-weight:bold;">Phone Number</label>
                                                                    <input type="string" class="form-control" id="number" name="number"
                                                                        placeholder="Enter your phone number" style="border:solid 1px #d9d8d9;">
                                                                </div>
                                                                    
                                                                <div class="mb-3">
                                                                    <label for="username" class="form-label" style="color: #ba1b1b;font-weight:bold;">Username</label>
                                                                    <input type="text" class="form-control" id="username" name="username"
                                                                        placeholder="Enter your username" style="border:solid 1px #d9d8d9;">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="password" class="form-label" style="color: #ba1b1b;font-weight:bold;">Password</label>
                                                                    <input type="password" class="form-control" id="password" name="password"
                                                                        placeholder="Enter your password" style="border:solid 1px #d9d8d9;">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="password" class="form-label" style="color: #ba1b1b;font-weight:bold;">Confirm Password</label>
                                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                                                        placeholder="Enter your password" style="border:solid 1px #d9d8d9;">
                                                                </div>

                                                                {{-- ADDRESS --}}
                                                                <label class="form-label" style="color: #ba1b1b;font-weight:bold;">Address</label>

                                                                <div class="input-group mt-2">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"  style="color: black; margin-right:1px; border:solid 1px #c7c6c7; background-color: #c7c6c7">
                                                                                <i class="material-icons">Region</i>
                                                                            </span>
                                                                        </div>
                                                                        <select class="form-control" name="region" id="region" on="getProvince(this);"
                                                                        style="max-width: 100% !important; border:solid 1px #d9d8d9; border-radius: 3px;"
                                                                        onchange="getProvince(this);">
                                                                        <option value="CAR">CAR</option>
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
                                                                        <option value="NCR">NCR</option>
                                                                    </select>
                                                                </div>

                                                                <div class="input-group mt-2">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" style="color: black; margin-right:1px;border:solid 1px #c7c6c7; background-color: #c7c6c7">
                                                                            <i class="material-icons">Province</i>
                                                                        </span>
                                                                    </div>
                                                                    <select name="province" class="form-control" id="province"
                                                                        style="max-width: 100% !important; border:solid 1px #d9d8d9; border-radius: 3px;"
                                                                        onchange="getMunicipality(this);">
                                                                        <option value=""></option>
                                                                    </select>
                                                                </div>

                                                                <div class="input-group mt-2">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"  style="color: black; margin-right:1px;border:solid 1px #c7c6c7; background-color: #c7c6c7">
                                                                            <i class="material-icons">Municipality</i>
                                                                        </span>
                                                                    </div>
                                                                    <select name="municipality" class="form-control" id="municipality"
                                                                        style="max-width: 100% !important; border:solid 1px #d9d8d9; border-radius: 3px;">
                                                                        <option value=""></option>
                                                                    </select>
                                                                </div>

                                                                <div class="input-group mt-2">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"  style="color: black; margin-right:1px;border:solid 1px #c7c6c7; background-color: #c7c6c7">
                                                                            <i class="material-icons" style="padding-bottom: 4px;">Barangay</i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" name="barangay" id="barangay" class="form-control p-2"
                                                                        placeholder="{{ __('Barangay') }}" value="{{ old('name') }}" required
                                                                        style="border:solid 1px #d9d8d9; border-radius: 3px;">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control mt-2" id="purok" name="purok"
                                                                        placeholder="Enter your purok" style="border:solid 1px #d9d8d9;">
                                                                </div>
                                                                        
                                                                <input type="hidden" name="action" id="action" value="Add" />
                                                                <input type="hidden" name="hidden_id" id="hidden_id" />
                                                            </div>
                                                                
                                                            {{-- MODAL FOOTER --}}
                                                            <div class="modal-footer" style="background-color: #d9d8d9;">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" name="submit-btn" id="submit-btn" value="Add"
                                                                    class="btn btn-info">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                <div class="row">
                                                    <div class="col-sm-3 mt-3">
                                                        <h6 class="mb-0" style="color: black; padding-top:1mm; padding-left:0;"></i>Username</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary mt-3">
                                                        {{Auth::user()->username}}
                                                    </div>
                                                </div>
                                                    <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"  style="color: black; padding-top:1mm; padding-left:0;">Age</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{Auth::user()->age}} years old
                                                    </div>
                                                </div>
                                                    <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"  style="color: black; padding-top:1mm; padding-left:0;">Birthday</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{Auth::user()->birthdate}}
                                                    </div>
                                                </div>
                                                    <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"  style="color: black; padding-top:1mm; padding-left:0;">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{Auth::user()->number}}
                                                    </div>
                                                </div>
                                                    <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    <h6 class="mb-0"  style="color: black; padding-top:1mm; padding-left:0;">Gender</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{Auth::user()->gender}}
                                                    </div>
                                                </div>
                                                    <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                    <h6 class="mb-0"  style="color: black; padding-top:1mm; padding-left:0;">Blood Type</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        {{Auth::user()->bloodtype}}
                                                    </div>
                                                </div>
                                                    <hr>
                                        </div>
                                    </div>                    
                                </div>
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

        <!-- Template Javascript -->
        <script src="/front/js/main.js"></script>

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

</body>
</html>