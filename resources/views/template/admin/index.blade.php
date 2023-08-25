<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - PT.XYZ CODING Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template_admin') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('template_admin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template_admin') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('template_admin') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('template_admin') }}/assets/css/style.css" rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('template_admin') }}/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">PT.XYZ CODING</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->




                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('template_admin') }}/assets/img/profile-img.jpg" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->name }}</h6>
                            <span>Admin</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ url('logout') }}" method="Post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Log
                                    Out</button>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ url('admin/dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            @if (Auth::user()->admin == 'Admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Daftar Barang</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ url('admin/barang') }}">
                                <i class="bi bi-circle"></i><span>Detail Barang</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Pengajuan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people-fill"></i><span>Daftar Pengajuan</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Pengajuan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ url('admin/pengajuan') }}">
                            <i class="bi bi-circle"></i><span>Detail Pengajuan</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if (Auth::user()->admin == 'Admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#ApprovePengajuan-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-card-checklist"></i><span>Daftar Approve Pengajuan</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="ApprovePengajuan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ url('admin/approve_pengajuan') }}">
                                <i class="bi bi-circle"></i><span>Detail Approve Pengajuan</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

        </ul>

    </aside><!-- End Sidebar-->

    @yield('content')

    <!-- ======= Footer ======= -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template_admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('template_admin') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template_admin') }}/assets/vendor/chart.js/chart.min.js"></script>
    <script src="{{ asset('template_admin') }}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('template_admin') }}/assets/vendor/quill/quill.min.js"></script>
    <script src="{{ asset('template_admin') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('template_admin') }}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('template_admin') }}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('template_admin') }}/assets/js/main.js"></script>

</body>

</html>
