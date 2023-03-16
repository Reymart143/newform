<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>User Management</title>
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
    <link href="/front/lib/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/front/css/style.css" rel="stylesheet">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <a href="{{url('/home')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{url('/profile')}}" class="nav-item nav-link"><i class="fa-solid fa-user me-2"></i>Profile</a>
                    <a href="{{url('/tables')}}" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Tables</a>
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

            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="rounded h-100 p-4" style="background-color:#f5f5f5;">
                            <h6 class="mb-4" style="color:rgb(24, 21, 21); font-size:19px;">User Management Table</h6>
                            <div class="table-responsive">
                                <table class="table table-striped tabled-bordered zero-configuration" style="color: black; background-color:#f5f5f5; border-color:black;" id="user_datatable" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full name</th>
                                            <th>Age</th>
                                            <th>Birthdate</th>
                                            <th>Phone Number</th>
                                            <th>Blood Type</th>
                                            <th>Gender</th>
                                            <th>Region</th>
                                            <th>Province</th>
                                            <th>Municipality</th>
                                            <th>Barangay</th>
                                            <th>Purok</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


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

    <script src="/front/lib/tables/js/jquery.dataTables.min.js"></script>
    <script src="/front/lib/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/front/lib/tables/js/datatable-init/datatable-basic.min.js"></script>

    <!-- Template Javascript -->
    <script src="/front/js/main.js"></script>

    <script type="text/javascript">

        var table = $('#user_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'age', name: 'age'},
                {data: 'birthdate', name: 'birthdate'},
                {data: 'number', name: 'number'},
                {data: 'bloodtype', name: 'bloodtype'},
                {data: 'gender', name: 'gender'},
                {data: 'region', name: 'region'},
                {data: 'province', name: 'province'},
                {data: 'city', name: 'city'},
                {data: 'barangay', name: 'barangay'},
                {data: 'purok', name: 'purok'},
                {data: 'username', name: 'username'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    
        $('#create_record').click(function(){
            $('.modal-title').text('Add New Record');
            $('#action_button').val('Add');
            $('#action').val('Add');
            $('#form_result').html('');
    
            $('#formModal').modal('show');
    
        })
    
    </script>
</body>

</html>