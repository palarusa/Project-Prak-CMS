<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index() {
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create() {
        return view('petugas.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required|unique:petugas,no_telepon',
            'alamat' => 'required'
        ]);

        Petugas::create($request->all());

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
    }

    public function show($id) {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.show', compact('petugas'));
    }

    public function edit($id) {
        $petugas = Petugas::findOrFail($id);
        return view('petugas.edit', compact('petugas'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required|unique:petugas,no_telepon,' . $id,
            'alamat' => 'required'
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->all());

        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil diperbarui.');
    }

    public function destroy($id) {
        Petugas::destroy($id);
        return redirect()->route('petugas.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
