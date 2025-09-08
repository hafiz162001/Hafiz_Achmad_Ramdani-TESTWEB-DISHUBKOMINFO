<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        return response()->json(
            Pegawai::with(['jabatan', 'skpd', 'unitKerja'])->get(),
            200
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip'           => 'required|string|unique:pegawais,nip',
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan_id'    => 'nullable|exists:jabatans,id',
            'skpd_id'       => 'nullable|exists:skpds,id',
            'unit_kerja_id' => 'nullable|exists:unit_kerjas,id',
            'nama_golongan' => 'nullable|string',
            'nama_pangkat'  => 'nullable|string',
            'alamat_lengkap'=> 'nullable|string'
        ]);

        $pegawai = Pegawai::create($request->all());
        return response()->json($pegawai, 201);
    }

    public function show($id)
    {
        $pegawai = Pegawai::with(['jabatan', 'skpd', 'unitKerja'])->findOrFail($id);
        return response()->json($pegawai, 200);
    }

    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::findOrFail($id);

        $request->validate([
            'nip' => "required|string|unique:pegawais,nip,$id",
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jabatan_id'    => 'nullable|exists:jabatans,id',
            'skpd_id'       => 'nullable|exists:skpds,id',
            'unit_kerja_id' => 'nullable|exists:unit_kerjas,id'
        ]);

        $pegawai->update($request->all());
        return response()->json($pegawai, 200);
    }

    public function destroy($id)
    {
        Pegawai::findOrFail($id)->delete();
        return response()->json(['message' => 'Pegawai deleted successfully'], 200);
    }
}
