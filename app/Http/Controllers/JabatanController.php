<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        return response()->json(Jabatan::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255'
        ]);

        $jabatan = Jabatan::create($request->all());
        return response()->json($jabatan, 201);
    }

    public function show($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return response()->json($jabatan, 200);
    }

    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());
        return response()->json($jabatan, 200);
    }

    public function destroy($id)
    {
        Jabatan::findOrFail($id)->delete();
        return response()->json(['message' => 'Jabatan deleted successfully'], 200);
    }
}
