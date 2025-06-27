<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index() {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create() {
        return view('pelanggan.create');
    }

    public function store(Request $request) {
            $request->validate([
        'nama' => 'required',
        'no_telepon' => 'required|unique:pelanggan,no_telepon',
        'alamat' => 'required',
        'email' => 'required|email|unique:pelanggan,email',
    ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

    public function show($id) {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit($id) {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id) {
            $request->validate([
        'nama' => 'required',
        'no_telepon' => 'required|unique:pelanggan,no_telepon,' . $id,
        'alamat' => 'required',
        'email' => 'required|email|unique:pelanggan,email,' . $id,
    ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }

    public function destroy($id) {
        Pelanggan::destroy($id);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    }
}

