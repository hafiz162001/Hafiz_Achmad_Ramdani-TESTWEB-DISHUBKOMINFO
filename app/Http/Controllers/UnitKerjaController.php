<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index()
    {
        return response()->json(UnitKerja::with('skpd')->get(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_kerja' => 'required|string|max:255',
            'skpd_id' => 'nullable|exists:skpds,id'
        ]);

        $unitKerja = UnitKerja::create($request->all());
        return response()->json($unitKerja, 201);
    }

    public function show($id)
    {
        $unitKerja = UnitKerja::with('skpd')->findOrFail($id);
        return response()->json($unitKerja, 200);
    }

    public function update(Request $request, $id)
    {
        $unitKerja = UnitKerja::findOrFail($id);
        $unitKerja->update($request->all());
        return response()->json($unitKerja, 200);
    }

    public function destroy($id)
    {
        UnitKerja::findOrFail($id)->delete();
        return response()->json(['message' => 'Unit Kerja deleted successfully'], 200);
    }
}
