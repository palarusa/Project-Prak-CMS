<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    // Menampilkan daftar semua petugas
    public function index()
    {
        return view('petugas.index', [
            'petugas' => petugas::all()
        ]);
    }

    // Menampilkan form tambah petugas
    public function create()
    {
        return view('petugas.create');
    }

    // Menyimpan data petugas baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        petugas::create([
            'nama' => $request->input('nama'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
        ]);

        return redirect()->route('petugas.index');
    }

    // Menampilkan detail petugas
    public function show($id)
    {
        $petugas = petugas::findOrFail($id);
        return view('petugas.show', compact('petugas'));
    }

    // Menampilkan form edit petugas
    public function edit($id)
    {
        $petugas = petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    // Memproses update data petugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        $petugas = petugas::findOrFail($id);

        $petugas->update([
            'nama' => $request->input('nama'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
        ]);

        return redirect()->route('petugas.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $petugas = petugas::findOrFail($id);
        return view('petugas.delete', compact('petugas'));
    }

    // Menghapus data petugas
    public function destroy($id)
    {
        $petugas = petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index');
    }
}