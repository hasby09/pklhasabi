<?php

namespace App\Http\Controllers\Api;

use App\Models\Siswa;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaReq;
use App\Http\Resources\SiswaResource;
use Illuminate\Http\Request;
use App\Http\Resources\SiswaResourceResource;
use Illuminate\Support\Facades\Validator;


class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::latest()->paginate(5);
        return new SiswaResource(true, 'List Data siswa', $siswa);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn'=> 'required',
            'nis'=>'required',
            'nama'=>'required',
            'kelas_id'=>'required',
            'alamat'=>'required',
            'no_telepon'=>'required',
            'id_spp'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $siswa = Siswa::create([
            'nisn'=> $request->nisn,
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'kelas_id'=>$request->kelas_id,
            'alamat'=>$request->alamat,
            'no_telepon'=>$request->no_telepon,
            'id_spp'=>$request->id_spp,
        ]);

        return new SiswaResource(true, 'Data siswa Berhasil Ditambahkan!', $siswa);
    }

    public function show($id_siswa)
    {
        $siswa = Siswa::find($id_siswa);
        return new SiswaResource(true, 'Detail Data siswa!', $siswa);
    }

    public function update(Request $request, $id_siswa)
    {
        $validator = Validator::make($request->all(), [
            'nisn'=> 'required',
            'nis'=>'required',
            'nama'=>'required',
            'kelas_id'=>'required',
            'alamat'=>'required',
            'no_telepon'=>'required',
            'id_spp'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $siswa = Siswa::find($id_siswa);
        $siswa->update([
            'nisn'=> $request->nisn,
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'kelas_id'=>$request->kelas_id,
            'alamat'=>$request->alamat,
            'no_telepon'=>$request->no_telepon,
            'id_spp'=>$request->id_spp,
        ]);

        return new SiswaResource(true, 'Data siswa Berhasil Diubah!', $siswa);

        
    }

    public function destroy($id_siswa)
    {
        $siswa = Siswa::find($id_siswa);
        $siswa->delete();

        return new SiswaResource(true, 'Data siswa Berhasil Dihapus!', null);
    }
}
