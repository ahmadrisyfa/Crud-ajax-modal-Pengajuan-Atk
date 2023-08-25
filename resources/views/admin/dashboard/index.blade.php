@extends('template.admin.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">


                                <div class="card-body">
                                    <h5 class="card-title">Total User</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $user }}</h6>
                                            <span class="text-success small pt-1 fw-bold">100%</span> <span
                                                class="text-muted small pt-2 ps-1">Real</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">


                                <div class="card-body">
                                    <h5 class="card-title">Total Barang</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $barang }}</h6>
                                            <span class="text-success small pt-1 fw-bold">100%</span> <span
                                                class="text-muted small pt-2 ps-1">Real</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-4 col-md-6">

                            <div class="card info-card customers-card">


                                <div class="card-body">
                                    <h5 class="card-title">Total Pengajuan</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-menu-button-wide"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $pengajuan }}</h6>
                                            <span class="text-success small pt-1 fw-bold">100%</span> <span
                                                class="text-muted small pt-2 ps-1">Real</span>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <!-- Reports -->
                        <div class="col-12">
                            <div class="card">

                                <section class="section dashboard">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="card">
                                                <div class="card-header">
                                                    <span class="btn btn-success mt-2">
                                                        Daftar Data Barang
                                                    </span>
                                                </div>
                                                <div class="card-body">
                                                    @if (session()->has('berhasil'))
                                                        <div class="alert alert-success alert-dismissible  mt-2"
                                                            role="alert">
                                                            {{ session('berhasil') }}
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                        </div>
                                                    @endif


                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <th scope="col">Nama Barang</th>
                                                                <th scope="col">Jumlah</th>
                                                                <th scope="col">Jenis Barang</th>
                                                                <th scope="col">Jenis Satuan Barang</th>
                                                                <th scope="col">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($databarang as $value)
                                                                <tr>
                                                                    <th>{{ $loop->iteration }}</th>
                                                                    <td>{{ $value->nama_barang }}</td>
                                                                    <td>{{ $value->jumlah }}</td>
                                                                    <td>{{ $value->jenis_barang }}</td>
                                                                    <td>{{ $value->jenis_satuan_barang }}</td>
                                                                    <td>{{ $value->status }}</td>

                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                </section>

                            </div>
                        </div><!-- End Reports -->


                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->

            </div>
        </section>

    </main>
@endsection
