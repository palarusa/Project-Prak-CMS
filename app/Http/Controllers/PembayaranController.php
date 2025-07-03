<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewaan;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with(['penyewaan', 'petugas'])->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
    {
        $penyewaan = Penyewaan::all();
        $petugas = Petugas::all();
        return view('pembayaran.create', compact('penyewaan', 'petugas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_sewa' => 'required|exists:penyewaan,id',
            'tgl_bayar' => 'required|date',
            'metode' => 'required|string',
            'jumlah_bayar' => 'required|numeric|min:1000',
            'id_petugas' => 'required|exists:petugas,id'
        ]);

        try {
            Pembayaran::create($validated);
            \Log::info('Pembayaran berhasil ditambahkan', compact('validated'));
            return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan pembayaran', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan pembayaran.');
        }
    }

    public function show($id)
    {
        try {
            $pembayaran = Pembayaran::with(['penyewaan', 'petugas'])->findOrFail($id);
            return view('pembayaran.show', compact('pembayaran'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Pembayaran tidak ditemukan saat show', compact('id'));
            return redirect()->route('pembayaran.index')->with('error', 'Data pembayaran tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            $penyewaan = Penyewaan::all();
            $petugas = Petugas::all();
            return view('pembayaran.edit', compact('pembayaran', 'penyewaan', 'petugas'));
        } catch (ModelNotFoundException $e) {
            \Log::error('Pembayaran tidak ditemukan saat edit', compact('id'));
            return redirect()->route('pembayaran.index')->with('error', 'Data pembayaran tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_sewa' => 'required|exists:penyewaan,id',
            'tgl_bayar' => 'required|date',
            'metode' => 'required|string',
            'jumlah_bayar' => 'required|numeric|min:1',
            'id_petugas' => 'required|exists:petugas,id'
        ]);

        try {
            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->update($validated);
            \Log::info('Pembayaran berhasil diperbarui', compact('id', 'validated'));
            return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            \Log::error('Pembayaran tidak ditemukan saat update', compact('id'));
            return redirect()->route('pembayaran.index')->with('error', 'Data pembayaran tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui pembayaran', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui pembayaran.');
        }
    }

    public function destroy($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->delete();
            \Log::info('Pembayaran berhasil dihapus', compact('id'));
            return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            \Log::error('Pembayaran tidak ditemukan saat hapus', compact('id'));
            return redirect()->route('pembayaran.index')->with('error', 'Data pembayaran tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus pembayaran', ['error' => $e->getMessage()]);
            return redirect()->route('pembayaran.index')->with('error', 'Terjadi kesalahan saat menghapus pembayaran.');
        }
    }
}
