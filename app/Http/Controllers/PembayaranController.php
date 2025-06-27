<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewaan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index() {
        $pembayaran = Pembayaran::with(['penyewaan', 'petugas'])->get();
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create() {
        $penyewaan = Penyewaan::all();
        $petugas = Petugas::all();
        return view('pembayaran.create', compact('penyewaan', 'petugas'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_sewa' => 'required|exists:penyewaan,id',
            'tgl_bayar' => 'required|date',
            'metode' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'id_petugas' => 'required|exists:petugas,id'
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    public function show($id) {
        $pembayaran = Pembayaran::with(['penyewaan', 'petugas'])->findOrFail($id);
        return view('pembayaran.show', compact('pembayaran'));
    }

    public function edit($id) {
        $pembayaran = Pembayaran::findOrFail($id);
        $penyewaan = Penyewaan::all();
        $petugas = Petugas::all();
        return view('pembayaran.edit', compact('pembayaran', 'penyewaan', 'petugas'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'id_sewa' => 'required|exists:penyewaan,id',
            'tgl_bayar' => 'required|date',
            'metode' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'id_petugas' => 'required|exists:petugas,id'
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update($request->all());
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran diperbarui.');
    }

    public function destroy($id) {
        Pembayaran::destroy($id);
        return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran dihapus.');
    }
}