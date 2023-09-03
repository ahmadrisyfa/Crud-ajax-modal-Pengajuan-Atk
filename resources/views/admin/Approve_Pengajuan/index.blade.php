@extends('template.admin.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pengajuan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengajuan</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('admin/approve_pengajuan/search')}}" method="post">
                                @csrf
                                <div class="form-group row mt-2">
                                    <div class="col-lg-3">
                                        <label for="fromDate">Dari Tanggal</label>
                                        <input id="fromDate" name="fromDate" value="{{ request('fromDate') }}" class="date-picker form-control" type="date" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="toDate">Sampai Tanggal</label>
                                        <input id="toDate" name="toDate" value="{{ request('toDate') }}" class="date-picker form-control" type="date" required>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn btn-info" style="margin-top: 23px" type="submit">Cari Berdasarkan Tanggal</button>
                                    </div>
                                </div>
                            </form>
                            

                            
                            @if (session()->has('berhasil'))
                                <div class="alert alert-success alert-dismissible  mt-2" role="alert">
                                    {{ session('berhasil') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <button class="btn btn-success mt-2" type="button" onclick="printTable()">
                                Cetak
                            </button>

                            <table class="table table-striped" id="printableTable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah Pinjam</th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Jumlah Stok Sekarang</th>
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Tanggal Keluar</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datapengajuan as $value)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->barang->nama_barang }}</td>
                                            <td>{{ $value->jumlah_pinjam }}</td>
                                            <td>{{ $value->catatan }}</td>
                                            <td>{{  $value->barang->jumlah }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>{{ $value->updated_at }}</td>
                                            <td>
                                                @if ($value->status == 'Tolak')
                                                    <span class="btn btn-danger btn-sm">{{ $value->status }}</span>
                                                @elseif($value->status == 'Menunggu Konfirmasi')
                                                    <span class="btn btn-info btn-sm">{{ $value->status }}</span>
                                                @else
                                                    <span class="btn btn-success btn-sm">{{ $value->status }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm edit-button"
                                                    data-id="{{ $value->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#editModal">
                                                    Approve
                                                </button>
                                                <button type="button"class="btn btn-info btn-sm detail-button"
                                                    data-id="{{ $value->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal">
                                                    Detail
                                                </button>
                                                {{-- <button data-id="{{ $value->id }}"
                                                    class="delete btn btn-danger btn-sm">Hapus</button> --}}

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
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

                            <input type="hidden" readonly name="edit_id" id="edit_id">
                            <label for="nama_barang" class="form-label">Nama User</label>
                            <input type="text" readonly name="user_id" id="edit_user_id" class="form-control">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" readonly name="id_barang" id="edit_id_barang" class="form-control">
                            <div class="col-12">
                                <label for="nama_barang" class="form-label">Catatan</label>
                                <textarea type="text" readonly name="catatan" id="edit_catatan" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="nama_barang" class="form-label">Jenis Barang</label>
                                <input type="text" readonly name="edit_id" id="edit_jenis_barang" class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="nama_barang" class="form-label">Jumlah Pinjam</label>
                                <input type="text" readonly name="jumlah_pinjam" id="edit_jumlah_pinjam"
                                    class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="nama_barang" class="form-label">Jenis Satuan Barang</label>
                                <input type="text" readonly name="edit_id" id="edit_jenis_satuan_barang"
                                    class="form-control">
                            </div>
                            <label for="nama_barang" class="form-label">Status</label>
                            <select name="status" id="edit_status" class="form-control" required>
                                <option value="" selected disabled style="text-align: center">-- Silahkan Pilih
                                    Nama Barang --</option>
                                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                <option value="Tolak">Tolak</option>
                                <option value="Di Terima">Di Terima</option>
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
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label for="nama_barang" class="form-label">Nama User</label>
                            <input type="text" disabled name="user_id" id="detail_user_id" class="form-control">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="hidden" readonly name="detail_id" id="detail_id">
                            <input type="text" disabled name="id_barang" id="detail_id_barang" class="form-control">
                            <div class="col-12">
                                <label for="nama_barang" class="form-label">Catatan</label>
                                <textarea type="text" readonly name="catatan" id="detail_catatan" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="nama_barang" class="form-label">Jenis Barang</label>
                                <input type="text" readonly name="detail_id" id="detail_jenis_barang"
                                    class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="nama_barang" class="form-label">Jenis Satuan Barang</label>
                                <input type="text" readonly name="detail_id" id="detail_jenis_satuan_barang"
                                    class="form-control">
                            </div>
                            <div class="col-12">
                                <label for="nama_barang" class="form-label">Jumlah Pinjam</label>
                                <input type="text" readonly name="jumlah_pinjam" id="detail_jumlah_pinjam"
                                    class="form-control">
                            </div>
                            <label for="nama_barang" class="form-label">Status</label>
                            <select name="status" disabled id="detail_status" class="form-control" required>
                                <option value="" selected disabled style="text-align: center">-- Silahkan Pilih
                                    Nama Barang --</option>
                                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                                <option value="Tolak">Tolak</option>
                                <option value="Di Terima">Di Terima</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </form>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.edit-button', function(event) {
                event.preventDefault();
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('admin/approve_pengajuan/edit') }}/' + id,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        $('#edit_id').val(id);
                        $('#edit_id_barang').val(data.barang.nama_barang);
                        $('#edit_user_id').val(data.user.name);
                        $('#edit_jenis_barang').val(data.barang.jenis_barang);
                        $('#edit_jenis_satuan_barang').val(data.barang.jenis_satuan_barang);
                        $('#edit_catatan').val(data.catatan);
                        $('#edit_status').val(data.status);
                        $('#edit_jumlah_pinjam').val(data.jumlah_pinjam);

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
                    "status": $("#edit_status").val(),


                };

                $.ajax({
                    url: '{{ url('admin/approve_pengajuan/update') }}/' + id,
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

            $(document).on('click', '.detail-button', function(event) {
                event.preventDefault();
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url('admin/approve_pengajuan/edit') }}/' + id,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        $('#detail_id').val(id);
                        $('#detail_id_barang').val(data.barang.nama_barang);
                        $('#detail_user_id').val(data.user.name);
                        $('#detail_jenis_barang').val(data.barang.jenis_barang);
                        $('#detail_jenis_satuan_barang').val(data.barang.jenis_satuan_barang);
                        $('#detail_catatan').val(data.catatan);
                        $('#detail_status').val(data.status);
                        $('#detail_jumlah_pinjam').val(data.jumlah_pinjam);


                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });


            });

        });
    </script>
@endsection
