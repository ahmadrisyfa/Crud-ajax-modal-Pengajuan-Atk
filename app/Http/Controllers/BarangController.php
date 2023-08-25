<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
class BarangController extends Controller
{
    public function index()
    {
        $data = Barang::all();
        return view('admin.barang.index',compact('data'));
    }
    public function store(Request $request)
    {
        $data = new Barang();
        $data->nama_barang = $request->input('nama_barang');
        $data->jumlah = $request->input('jumlah');
        $data->jenis_barang = $request->input('jenis_barang');
        $data->jenis_satuan_barang = $request->input('jenis_satuan_barang');
        $data->status = $request->status;

        $data->save();

        return response()->json(['message' => 'Data created successfully']);
    }
    public function edit($id)
    {
        $data = Barang::find($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $data = Barang::find($id);
        $data->nama_barang = $request->input('nama_barang');
        $data->jumlah = $request->input('jumlah');
        $data->jenis_barang = $request->input('jenis_barang');
        $data->jenis_satuan_barang = $request->input('jenis_satuan_barang');
        $data->status = $request->status;
        $data->save();

        return response()->json(['message' => 'Data updated successfully']);
    }
    public function destroy($id)
    {
            $data = Barang::find($id);
            $data->delete();
            return response()->json(['message' => 'Data deleted successfully']);
    }

}
