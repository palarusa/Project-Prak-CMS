<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyewaan;

class penyewaanController extends Controller
{
    // Menampilkan daftar semua penyewaan
    public function index()
    {
        return view('penyewaan.index', [
            'penyewaan' => penyewaan::all()
        ]);
    }

    // Menampilkan form tambah penyewaan
    public function create()
    {
        return view('penyewaan.create');
    }

    // Menyimpan data penyewaan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        penyewaan::create([
            'nama' => $request->input('nama'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
        ]);

        return redirect()->route('penyewaan.index');
    }

    // Menampilkan detail penyewaan
    public function show($id)
    {
        $penyewaan = penyewaan::findOrFail($id);
        return view('penyewaan.show', compact('penyewaan'));
    }

    // Menampilkan form edit penyewaan
    public function edit($id)
    {
        $penyewaan = penyewaan::findOrFail($id);
        return view('penyewaan.edit', compact('penyewaan'));
    }

    // Memproses update data penyewaan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
        ]);

        $penyewaan = penyewaan::findOrFail($id);

        $penyewaan->update([
            'nama' => $request->input('nama'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat'),
        ]);

        return redirect()->route('penyewaan.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $penyewaan = penyewaan::findOrFail($id);
        return view('penyewaan.delete', compact('penyewaan'));
    }

    // Menghapus data penyewaan
    public function destroy($id)
    {
        $penyewaan = penyewaan::findOrFail($id);
        $penyewaan->delete();

        return redirect()->route('penyewaan.index');
    }
}