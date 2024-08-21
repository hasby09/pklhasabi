<?php
namespace App\Http\Controllers\Api;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\KelasResource;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->paginate(5);
        return new KelasResource(true, 'List Data Kelas', $kelas);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kelas = Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return new KelasResource(true, 'Data Kelas Berhasil Ditambahkan!', $kelas);
    }

    public function show($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        return new KelasResource(true, 'Detail Data Kelas!', $kelas);
    }

    public function update(Request $request, $id_kelas)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $kelas = Kelas::find($id_kelas);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        return new KelasResource(true, 'Data Kelas Berhasil Diubah!', $kelas);

        
    }

    public function destroy($id_kelas)
    {
        $kelas = Kelas::find($id_kelas);
        $kelas->delete();

        return new KelasResource(true, 'Data Kelas Berhasil Dihapus!', null);
    }
}