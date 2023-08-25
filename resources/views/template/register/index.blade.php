<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Login - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('template_admin') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ asset('template_admin') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="{{ asset('template_admin') }}/https://fonts.gstatic.com" rel="preconnect">
    <link
        href="{{ asset('template_admin') }}/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
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

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="{{ asset('template_admin') }}/index.html"
                                    class="logo d-flex align-items-center w-auto">
                                    <img src="{{ asset('template_admin') }}/assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Register to Your Account</h5>
                                        <p class="text-center small">Enter your Email & password to Register</p>
                                    </div>
                                    @if (session()->has('LoginError'))
                                        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                            <i class="bi bi-check-circle me-1"></i>
                                            {{ session('LoginError') }}
                                        </div>
                                    @endif
                                    @if (session()->has('berhasil_registrasi'))
                                        <div class="alert alert-success alert-dismissible fade show mt-2"
                                            role="alert">
                                            <i class="bi bi-check-circle me-1"></i>
                                            {{ session('berhasil_registrasi') }}
                                        </div>
                                    @endif
                                    <form class="row g-3 needs-validation" action="{{ url('register') }}"
                                        method="post">
                                        @csrf
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Name</label>
                                            <div class="input-group has-validation">

                                                <input type="text" name="name" class="form-control"
                                                    id="yourUsername" required>
                                                @error('name')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="email" name="email" class="form-control"
                                                    id="yourUsername" required>
                                                @error('email')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            @error('password')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>


                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ url('login') }}">Log In</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="{{ asset('template_admin') }}/#" class="back-to-top d-flex align-items-center justify-content-center"><i
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
