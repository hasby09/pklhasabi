<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaReq;
use App\Models\Kelas;
use App\Models\siswa;
use App\Models\Siswa as ModelsSiswa;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa =siswa::all();
        return view('siswa.index', compact('siswa'));
    } 

    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.create',compact('kelas','spp')); 
    }

    public function store(SiswaReq $request)
    {
       // dd($request->input());
        siswa::create($request->input());
        return redirect()->route('siswa.index')->with('success', 'data created successfully');
    }

    public function show($id_siswa)
    {
       //dd($id_siswa);
        $siswa = Siswa::findOrFail($id_siswa);
        return view('siswa.show', compact('siswa'));

    }

    public function edit($id_siswa)
    {
       // dd($id_siswa);
        $siswa = Siswa::findOrFail($id_siswa);
        $kelas = Kelas::all(); 
        $spp = Spp::all();// Ambil data siswa berdasarkan ID
        return view('siswa.edit', compact('siswa','kelas','spp')); // Kirim data ke view
    }
    //EROR
    public function update(SiswaReq $request, $id_siswa)
    {
        //dd($request,$request->input());
        $siswa = Siswa::findOrFail($id_siswa);
        $kelas = Kelas::all();
        $spp = Spp::all();
        $siswa->update($request->input());
        return redirect()->route('siswa.index')->with('success', 'Siswa updated successfully');
    }
    public function destroy($id_siswa)
    {
        //dd($id_siswa);
        $siswa = Siswa::withTrashed()->findOrFail($id_siswa);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'data siswa deleted successfully');
    }

    public function restore($id_siswa)
    {
        //dd($id_siswa);
        $siswa = Siswa::onlyTrashed()->findOrFail($id_siswa);
        $siswa->restore();
        return redirect()->route('siswa.index')->with('success', 'Siswa restored successfully');
    }
}