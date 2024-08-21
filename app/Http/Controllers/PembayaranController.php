<?php

namespace App\Http\Controllers;
use App\Http\Requests\PembayaranReq;
use App\Models\Pembayaran;
use App\Models\Spp;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran =Pembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
    }  
    
    public function create()
    {
        $pembayaran = Pembayaran::all();
        $spp = Spp::all();
        return view('pembayaran.create',compact('pembayaran','spp')); 
    }

    public function store(PembayaranReq $request)
    {
       // dd($request->input());
        Pembayaran::create($request->input());
        return redirect()->route('pembayaran.index')->with('success', 'data created successfully');
    }

    public function show($id_pembayaran)
    {
       //dd($id_siswa);
        $pembayaran = Pembayaran::findOrFail($id_pembayaran);
        return view('pembayaran.show', compact('pembayaran'));

    }

    public function edit($id_pembayaran)
    {
        //dd($id_siswa);
        $pembayaran = Pembayaran::findOrFail($id_pembayaran); 
        $spp = Spp::all();// Ambil data pe$pembayaran berdasarkan ID
        return view('pembayaran.edit', compact('pembayaran','spp')); 
    }

    public function update(PembayaranReq $request, $id_pembayaran)
    {
        $pembayaran = Pembayaran::findOrFail($id_pembayaran);
        $spp = Spp::all();
        $pembayaran->update($request->input());
        return redirect()->route('pembayaran.index')->with('success', 'Siswa updated successfully');
    }

    public function destroy($id_pembayaran)
    {
        //dd($id_pembayaran);
        $pembayaran = Pembayaran::withTrashed()->findOrFail($id_pembayaran);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'data pembayaran deleted successfully');
    }

    public function restore($id_pembayaran)
    {
        //dd($id_pembayaran);
        $pembayaran = Pembayaran::onlyTrashed()->findOrFail($id_pembayaran);
        $pembayaran->restore();
        return redirect()->route('pembayaran.index')->with('success', 'pembayaran restored successfully');
    }
}
