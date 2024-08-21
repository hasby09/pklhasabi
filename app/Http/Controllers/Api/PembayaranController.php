<?php

namespace App\Http\Controllers\Api;
use App\Models\Pembayaran;
use App\Http\Controllers\Controller;
use App\Http\Resources\PembayaranResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::latest()->paginate(5);
        return new PembayaranResource(true, 'List Data Pembayaran', $pembayaran);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn'=> 'required',
            'tgl_bayar'=> 'required',
            'bln_bayar'=> 'required',
            'tahun_bayar'=> 'required',
            'id_spp'=> 'required',
            'jumlah_bayar'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pembayaran = Pembayaran::create([
            'nisn'=> $request->nisn,
            'tgl_bayar'=> $request->tgl_bayar,
            'bln_bayar'=> $request->bln_bayar,
            'tahun_bayar'=> $request->tahun_bayar,
            'id_spp'=> $request->id_spp,
            'jumlah_bayar'=> $request->jumlah_bayar
        ]);

        return new PembayaranResource(true, 'Data Pembayaran Berhasil Ditambahkan!', $pembayaran);
    }

    public function show($id_pembayaran)
    {
        $pembayaran = Pembayaran::find($id_pembayaran);
        return new PembayaranResource(true, 'Detail Data Pembayaran!', $pembayaran);
    }

    public function update(Request $request, $id_pembayaran)
    {
        $validator = Validator::make($request->all(), [
            'nisn'=> 'required',
            'tgl_bayar'=> 'required',
            'bln_bayar'=> 'required',
            'tahun_bayar'=> 'required',
            'id_spp'=> 'required',
            'jumlah_bayar'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pembayaran = Pembayaran::find($id_pembayaran);
        $pembayaran->update([
            'nisn'=> $request->nisn,
            'tgl_bayar'=> $request->tgl_bayar,
            'bln_bayar'=> $request->bln_bayar,
            'tahun_bayar'=> $request->tahun_bayar,
            'id_spp'=> $request->id_spp,
            'jumlah_bayar'=> $request->jumlah_bayar
        ]);

        return new PembayaranResource(true, 'Data Pembayaran Berhasil Diubah!', $pembayaran);

        
    }

    public function destroy($id_pembayaran)
    {
        $pembayaran = Pembayaran::find($id_pembayaran);
        $pembayaran->delete();

        return new PembayaranResource(true, 'Data Pembayaran Berhasil Dihapus!', null);
    }   
}
