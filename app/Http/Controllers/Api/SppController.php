<?php

namespace App\Http\Controllers\Api;

use App\Models\Spp;
use App\Http\Controllers\Controller;
use App\Http\Resources\SppResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SppController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $spp = Spp::latest()->paginate(5);

        //return collection of posts as a resource
        return new SppResource(true, 'List Data Posts', $spp);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun'=> 'required',
            'nominal'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $spp = Spp::create([
            'tahun'=>  $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return new SppResource(true, 'Data Kelas Berhasil Ditambahkan!', $spp);
    }

    public function show($id_spp)
    {
        $spp = Spp::find($id_spp);
        return new SppResource(true, 'Detail Data Kelas!', $spp);
    }

    public function update(Request $request, $id_kelas)
    {
        $validator = Validator::make($request->all(), [
            'tahun'=> 'required',
            'nominal'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $spp = Spp::find($id_kelas);
        $spp->update([
            'tahun'=>  $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return new SppResource(true, 'Data Spp Berhasil Diubah!', $spp);

        
    }

    public function destroy($id_spp)
    {
        $spp = Spp::find($id_spp);
        $spp->delete();

        return new SppResource(true, 'Data Spp Berhasil Dihapus!', null);
    }
}
