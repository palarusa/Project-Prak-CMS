<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            'no_telepon' => 'required|numeric|unique:pelanggan,no_telepon' . ($id ? ',' . $id : ''),
            'alamat' => 'required',
            'email' => 'required|email|unique:pelanggan,email',
        ]);

        try {
            Pelanggan::create($request->all());
            \Log::info('Pelanggan berhasil ditambahkan', ['data' => $request->all()]);
            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan pelanggan', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id) {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.show', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Pelanggan tidak ditemukan saat show', ['id' => $id]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function edit($id) {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            return view('pelanggan.edit', compact('pelanggan'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Pelanggan tidak ditemukan saat edit', ['id' => $id]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'no_telepon' => 'required|numeric|unique:pelanggan,no_telepon' . ($id ? ',' . $id : ''),
            'alamat' => 'required',
            'email' => 'required|email|unique:pelanggan,email,' . $id,
        ]);

        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->update($request->all());

            \Log::info('Pelanggan berhasil diperbarui', ['id' => $id]);
            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            \Log::error('Pelanggan tidak ditemukan saat update', ['id' => $id]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui pelanggan', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function destroy($id) {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();
            \Log::info('Pelanggan berhasil dihapus', ['id' => $id]);
            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            \Log::error('Pelanggan tidak ditemukan saat hapus', ['id' => $id]);
            return redirect()->route('pelanggan.index')->with('error', 'Data pelanggan tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus pelanggan', ['error' => $e->getMessage()]);
            return redirect()->route('pelanggan.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
