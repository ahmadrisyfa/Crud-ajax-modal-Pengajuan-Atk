<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\Barang;

class ApprovePengajuanController extends Controller
{
    public function index()
    {
        $data = Barang::all();
        $datapengajuan = Pengajuan::with('user','barang')->get();

        return view('admin.Approve_Pengajuan.index',compact('data','datapengajuan'));
    }
   
    public function edit($id)
    {
        $data = Pengajuan::with('user','barang')->find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

    $previousStatus = $pengajuan->status; // Get the previous status
    $newStatus = $request->input('status');
    $pengajuan->status = $newStatus;
    $pengajuan->save();

        if ($previousStatus !== 'Di Terima' && $newStatus === 'Di Terima') {
        // Decrease "jumlah" field in the relevant table
        $jumlahToDecrease = $pengajuan->jumlah_pinjam;
        // Assuming the related model is named "Benda" and the field to decrease is "jumlah"
        $benda = Barang::findOrFail($pengajuan->id_barang);
        $benda->jumlah -= $jumlahToDecrease;
        $benda->save();
        }
        return response()->json(['message' => 'Data updated successfully']);
    }
    public function destroy($id)
    {
            $data = Pengajuan::find($id);
            $data->delete();
            return response()->json(['message' => 'Data deleted successfully']);
    }

}
