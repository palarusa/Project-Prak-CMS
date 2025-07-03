<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
        ]);

        try {
            Petugas::create($validated);
            \Log::info('Petugas berhasil ditambahkan', compact('validated'));
            return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan petugas', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan petugas.');
        }
    }

    public function show($id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            return view('petugas.show', compact('petugas'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('petugas.index')->with('error', 'Petugas tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            return view('petugas.edit', compact('petugas'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('petugas.index')->with('error', 'Petugas tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'    => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
            'alamat'  => 'required|string|max:255',
        ]);

        try {
            $petugas = Petugas::findOrFail($id);
            $petugas->update($validated);
            \Log::info('Petugas berhasil diperbarui', compact('id', 'validated'));
            return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('petugas.index')->with('error', 'Petugas tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui petugas', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui petugas.');
        }
    }

    public function destroy($id)
    {
        try {
            $petugas = Petugas::findOrFail($id);
            $petugas->delete();
            \Log::info('Petugas berhasil dihapus', compact('id'));
            return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('petugas.index')->with('error', 'Petugas tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus petugas', ['error' => $e->getMessage()]);
            return redirect()->route('petugas.index')->with('error', 'Terjadi kesalahan saat menghapus petugas.');
        }
    }
}
