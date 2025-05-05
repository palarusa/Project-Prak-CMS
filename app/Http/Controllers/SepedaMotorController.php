<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SepedaMotor;

class SepedaMotorController extends Controller
{
    // Menampilkan daftar semua sepedamotor
    public function index()
    {
        return view('sepedamotor.index', [
            'sepedamotor' => sepedamotor::all()
        ]);
    }

    // Menampilkan form tambah sepedamotor
    public function create()
    {
        return view('sepedamotor.create');
    }

    // Menyimpan data sepedamotor baru
    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|string|max:255',
            'tipe' => 'required|string|max:20',
            'nopol' => 'required|string|max:255',
            'statusl' => 'required|email|max:255',
        ]);

        sepedamotor::create([
            'nama' => $request->input('nama'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('sepedamotor.index');
    }

    // Menampilkan detail sepedamotor
    public function show($id)
    {
        $sepedamotor = sepedamotor::findOrFail($id);
        return view('sepedamotor.show', compact('sepedamotor'));
    }

    // Menampilkan form edit sepedamotor
    public function edit($id)
    {
        $sepedamotor = sepedamotor::findOrFail($id);
        return view('sepedamotor.edit', compact('sepedamotor'));
    }

    // Memproses update data sepedamotor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $sepedamotor = sepedamotor::findOrFail($id);

        $sepedamotor->update([
            'nama' => $request->input('nama'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('sepedamotor.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $sepedamotor = sepedamotor::findOrFail($id);
        return view('sepedamotor.delete', compact('sepedamotor'));
    }

    // Menghapus data sepedamotor
    public function destroy($id)
    {
        $sepedamotor = sepedamotor::findOrFail($id);
        $sepedamotor->delete();

        return redirect()->route('sepedamotor.index');
    }
}