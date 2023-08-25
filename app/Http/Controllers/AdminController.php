<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Pengajuan;
use App\Models\Pendaftaran;
class AdminController extends Controller
{
    public function index()
    {
        $user = User::count();
        $barang = Barang::count();
        $databarang = Barang::get();
        $pengajuan = Pengajuan::count();
        return view('admin.dashboard.index',compact('user','barang','pengajuan','databarang'));
    }

    public function pendaftaranindex()
    {
        $data = Pendaftaran::all();
        return view('admin.pendaftaran.index',compact('data'));
    }
}
