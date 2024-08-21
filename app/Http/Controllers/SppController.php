<?php

namespace App\Http\Controllers;

use App\Http\Requests\SppReq;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spp =Spp::all();
        return view('spp.index', compact('spp'));
    }


    public function create()
    {
        return view('spp.create'); 
    }

    public function store(SppReq $request)
    {   
        //dd($request->validated());
        Spp::create($request->validated());
        return redirect()->route('spp.index')->with('success', 'Spp created successfully');
    }

    public function show($id_spp)
    {
        $spp = Spp::findOrFail($id_spp);
        return view('spp.show', compact('spp'));
    }

    public function edit($id_spp)
    {
        $spp = Spp::findOrFail($id_spp);
        return view('spp.edit', compact('spp'));
    }

    public function update(SppReq $request, $id_spp)
    {
        $spp = Spp::findOrFail($id_spp);
        $spp->update($request->validated());
        return redirect()->route('spp.index')->with('success', 'Spp updated successfully');
    }

    public function destroy($id_spp)
    {
        $spp = Spp::withTrashed()->findOrFail($id_spp);
        $spp->delete();
        return redirect()->route('spp.index')->with('success', 'Kelas deleted successfully');
    }

    public function restore($id_spp)
    {
        $spp = Spp::onlyTrashed()->findOrFail($id_spp);
        $spp->restore();
        return redirect()->route('spp.index')->with('success', 'Kelas restored successfully');
    }

}
