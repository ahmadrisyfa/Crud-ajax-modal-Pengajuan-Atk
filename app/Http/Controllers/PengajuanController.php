<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    public function index()
    {
        $data = Barang::where('status','Tersedia')->get();
        $datapengajuan = Pengajuan::where('user_id', Auth()->user()->id)->get();

        return view('admin.pengajuan.index',compact('data','datapengajuan'));
    }
    public function store(Request $request)
    {
        $data = new Pengajuan();
        $data->id_barang = $request->input('id_barang');
        $data->catatan = $request->input('catatan');
        $data->jumlah_pinjam = $request->input('jumlah_pinjam');

        $data->user_id = Auth()->user()->id;
        $data->status = 'Menunggu Konfirmasi';
        $data->save();

        return response()->json(['message' => 'Data created successfully']);
    }
    public function edit($id)
    {
        $data = Pengajuan::with('barang')->find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Pengajuan::find($id);
        $data->id_barang = $request->input('id_barang');
        $data->catatan = $request->input('catatan');
        $data->jumlah_pinjam = $request->input('jumlah_pinjam');
      
        $data->save();

        return response()->json(['message' => 'Data updated successfully']);
    }
    public function destroy($id)
    {
            $data = Pengajuan::find($id);
            $data->delete();
            return response()->json(['message' => 'Data deleted successfully']);
    }

}
