<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    public function index()
    {
        return response()->json(Skpd::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'skpd' => 'required|string|max:255'
        ]);

        $skpd = Skpd::create($request->all());
        return response()->json($skpd, 201);
    }

    public function show($id)
    {
        $skpd = Skpd::findOrFail($id);
        return response()->json($skpd, 200);
    }

    public function update(Request $request, $id)
    {
        $skpd = Skpd::findOrFail($id);
        $skpd->update($request->all());
        return response()->json($skpd, 200);
    }

    public function destroy($id)
    {
        Skpd::findOrFail($id)->delete();
        return response()->json(['message' => 'SKPD deleted successfully'], 200);
    }
}
