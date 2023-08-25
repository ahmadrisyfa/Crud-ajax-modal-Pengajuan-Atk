@extends('template.admin.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Barang</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Barang</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            @if (session()->has('berhasil'))
                                <div class="alert alert-success alert-dismissible  mt-2" role="alert">
                                    {{ session('berhasil') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#createModal">
                                Tambah Data
                            </button>

                            <button class="btn btn-info mt-2" type="button" onclick="printTable()">
                                Cetak
                            </button>

                            <table class="table table-striped" id="printableTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Jenis Barang</th>
                                        <th scope="col">Jenis Satuan Barang</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $value->nama_barang }}</td>
                                            <td>{{ $value->jumlah }}</td>
                                            <td>{{ $value->jenis_barang }}</td>
                                            <td>{{ $value->jenis_satuan_barang }}</td>
                                            <td>{{ $value->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm edit-button"
                                                    data-id="{{ $value->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#editModal">
                                                    Edit
                                                </button>
                                                {{-- <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#detailmodal{{ $value->id }}">
                                                    Detail
                                                </button> --}}
                                                <button data-id="{{ $value->id }}"
                                                    class="delete btn btn-danger btn-sm">Hapus</button>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
        </section>
    </main>
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <input readonly type="hidden" class="form-control" id="edit_id" name="edit_id">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input required type="text" class="form-control" id="edit_nama_barang" name="nama_barang">
                        </div>
                        <div class="col-12">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input required type="number"class="form-control" id="edit_jumlah" name="jumlah">
                        </div>
                        <div class="col-12">
                            <label for="jenis_barang" class="form-label">Jenis Barang</label>
                            <input required type="text" class="form-control" id="edit_jenis_barang" name="jenis_barang">
                        </div>
                        <div class="col-12">
                            <label for="jenis_satuan_barang" class="form-label">Jenis Satuan Barang</label>
                            <input required type="text" class="form-control" id="edit_jenis_satuan_barang"
                                name="jenis_satuan_barang">
                        </div>
                        <div class="col-12">
                            <label for="nama_barang" class="form-label">Status</label>
                            <select name="status" id="edit_status" class="form-control" required>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
                <script>
                    function printTable() {
                        const table = document.getElementById('printableTable');

                        // Open a new browser window with the printable content
                        const newWindow = window.open('', '_blank');
                        newWindow.document.write(`
                            <html>
                            <head>
                                <title>Printable Table</title>
                                <style>
                                    /* Add your print-specific styles here */
                                    @media print {
                                        /* Define your styles for printing */
                                        table {
                                            width: 100%;
                                            border-collapse: collapse;
                                        }
                                        th, td {
                                            border: 1px solid black;
                                            padding: 8px;
                                            text-align: left;
                                        }
                                    }
                                </style>
                            </head>
                            <body>
                                ${table.outerHTML}
                            </body>
                            </html>
                        `);

                        newWindow.document.close();
                        newWindow.print();
                    }
                </script>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createForm">
                        @csrf
                        <div class="col-12">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input required type="text" class="form-control" id="nama_barang" name="nama_barang">
                        </div>
                        <div class="col-12">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input required type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>
                        <div class="col-12">
                            <label for="jenis_barang" class="form-label">Jenis Barang</label>
                            <input required type="text" class="form-control" id="jenis_barang" name="jenis_barang">
                        </div>
                        <div class="col-12">
                            <label for="jenis_satuan_barang" class="form-label">Jenis Satuan Barang</label>
                            <input required type="text" class="form-control" id="jenis_satuan_barang"
                                name="jenis_satuan_barang">
                        </div>
                        <div class="col-12">
                            <label for="nama_barang" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Tidak Tersedia">Tidak Tersedia</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {


            $("#createForm").submit(function(event) {
                event.preventDefault();

                var data = {
                    "_token": "{{ csrf_token() }}",
                    "nama_barang": $("#nama_barang").val(),
                    "jumlah": $("#jumlah").val(),
                    "jenis_barang": $("#jenis_barang").val(),
                    "jenis_satuan_barang": $("#jenis_satuan_barang").val(),
                    "status": $("#status").val(),

                };
                $.ajax({
                    url: '{{ route('barang.store') }}',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
            $(document).on('click', '.edit-button', function(event) {
                event.preventDefault();
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('admin/barang/edit') }}/' + id,
                    type: 'GET',
                    success: function(data) {
                        $('#edit_id').val(id);
                        $('#edit_nama_barang').val(data.nama_barang);
                        $('#edit_jumlah').val(data.jumlah);
                        $('#edit_jenis_barang').val(data.jenis_barang);
                        $('#edit_jenis_satuan_barang').val(data.jenis_satuan_barang);
                        $('#edit_status').val(data.status);


                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });


            });
            $("#editForm").submit(function(event) {
                event.preventDefault();

                var id = $('#edit_id').val();
                var data = {
                    "_token": "{{ csrf_token() }}",
                    "nama_barang": $("#edit_nama_barang").val(),
                    "jumlah": $("#edit_jumlah").val(),
                    "jenis_barang": $("#edit_jenis_barang").val(),
                    "jenis_satuan_barang": $("#edit_jenis_satuan_barang").val(),
                    "status": $("#edit_status").val(),

                };

                $.ajax({
                    url: '{{ url('admin/barang/update') }}/' + id,
                    type: 'PUT',
                    data: data,
                    success: function(response) {
                        alert(response.message);
                        location.reload();

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $(document).on('click', '.delete', function(event) {
                event.preventDefault();
                var id = $(this).data('id');

                if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                    $.ajax({
                        url: '{{ url('admin/barang/delete') }}/' + id,

                        type: 'get',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            alert(response.message);
                            location.reload();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });

        });
    </script>
@endsection
