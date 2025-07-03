<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Pelanggan;
use App\Models\SepedaMotor;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PenyewaanController extends Controller
{
    public function index()
    {
        $penyewaan = Penyewaan::with(['pelanggan', 'SepedaMotor', 'petugas'])->get();
        return view('penyewaan.index', compact('penyewaan'));
    }

    public function create()
    {
        return view('penyewaan.create', [
            'pelanggan' => Pelanggan::all(),
            'motor' => SepedaMotor::all(),
            'petugas' => Petugas::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_motor'     => 'required|exists:sepeda_motors,id',
            'tgl_sewa'     => 'required|date',
            'tgl_kembali'  => 'required|date|after_or_equal:tgl_sewa',
            'total_bayar'  => 'required|numeric|min:0',
            'id_petugas'   => 'required|exists:petugas,id',
        ]);

        try {
            Penyewaan::create($validated);
            \Log::info('Data penyewaan ditambahkan', compact('validated'));
            return redirect()->route('penyewaan.index')->with('success', 'Data penyewaan berhasil ditambahkan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan penyewaan', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data penyewaan.');
        }
    }

    public function show($id)
    {
        try {
            $penyewaan = Penyewaan::with(['pelanggan', 'SepedaMotor', 'petugas'])->findOrFail($id);
            return view('penyewaan.show', compact('penyewaan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('penyewaan.index')->with('error', 'Data penyewaan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $penyewaan = Penyewaan::findOrFail($id);
            return view('penyewaan.edit', [
                'penyewaan' => $penyewaan,
                'pelanggan' => Pelanggan::all(),
                'sepeda_motor' => SepedaMotor::all(),
                'petugas' => Petugas::all(),
            ]);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('penyewaan.index')->with('error', 'Data penyewaan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_motor'     => 'required|exists:sepeda_motors,id',
            'tgl_sewa'     => 'required|date',
            'tgl_kembali'  => 'required|date|after_or_equal:tgl_sewa',
            'total_bayar'  => 'required|numeric|min:0',
            'id_petugas'   => 'required|exists:petugas,id',
        ]);

        try {
            $penyewaan = Penyewaan::findOrFail($id);
            $penyewaan->update($validated);
            \Log::info('Data penyewaan diperbarui', compact('id', 'validated'));
            return redirect()->route('penyewaan.index')->with('success', 'Data penyewaan berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('penyewaan.index')->with('error', 'Data penyewaan tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui penyewaan', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data penyewaan.');
        }
    }

    public function destroy($id)
    {
        try {
            $penyewaan = Penyewaan::findOrFail($id);
            $penyewaan->delete();
            \Log::info('Data penyewaan dihapus', compact('id'));
            return redirect()->route('penyewaan.index')->with('success', 'Data penyewaan berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('penyewaan.index')->with('error', 'Data penyewaan tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus penyewaan', ['error' => $e->getMessage()]);
            return redirect()->route('penyewaan.index')->with('error', 'Terjadi kesalahan saat menghapus data penyewaan.');
        }
    }
}
