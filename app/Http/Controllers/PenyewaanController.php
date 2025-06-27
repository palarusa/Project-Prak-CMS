<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use App\Models\Pelanggan;
use App\Models\SepedaMotor;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index() {
        $penyewaan = Penyewaan::with(['pelanggan', 'motor', 'petugas'])->get();
        return view('penyewaan.index', compact('penyewaan'));
    }

    public function create() {
        $pelanggan = Pelanggan::all();
        $motor = SepedaMotor::where('status', 'Tersedia')->get();
        $petugas = Petugas::all();
        return view('penyewaan.create', compact('pelanggan', 'motor', 'petugas'));
    }

    public function store(Request $request) {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_sepedamotor' => 'required|exists:sepeda_motor,id',
            'id_petugas' => 'required|exists:petugas,id',
            'tgl_sewa' => 'required|date',
            'lama_sewa' => 'required|integer|min:1'
        ]);

        $motor = SepedaMotor::findOrFail($request->id_sepedamotor);
        $total_biaya = $motor->harga_sewa_per_hari * $request->lama_sewa;

        Penyewaan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_sepedamotor' => $request->id_sepedamotor,
            'id_petugas' => $request->id_petugas,
            'tgl_sewa' => $request->tgl_sewa,
            'lama_sewa' => $request->lama_sewa,
            'total_biaya' => $total_biaya,
        ]);

        $motor->update(['status' => 'Disewa']);

        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil ditambahkan.');
    }

    public function show($id) {
        $penyewaan = Penyewaan::with(['pelanggan', 'motor', 'petugas'])->findOrFail($id);
        return view('penyewaan.show', compact('penyewaan'));
    }

    public function edit($id) {
        $penyewaan = Penyewaan::findOrFail($id);
        $pelanggan = Pelanggan::all();
        $motor = SepedaMotor::all();
        $petugas = Petugas::all();
        return view('penyewaan.edit', compact('penyewaan', 'pelanggan', 'motor', 'petugas'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'id_pelanggan' => 'required|exists:pelanggan,id',
            'id_sepedamotor' => 'required|exists:sepeda_motor,id',
            'id_petugas' => 'required|exists:petugas,id',
            'tgl_sewa' => 'required|date',
            'lama_sewa' => 'required|integer|min:1'
        ]);

        $penyewaan = Penyewaan::findOrFail($id);
        $motor = SepedaMotor::findOrFail($request->id_sepedamotor);
        $total_biaya = $motor->harga_sewa_per_hari * $request->lama_sewa;

        $penyewaan->update([
            'id_pelanggan' => $request->id_pelanggan,
            'id_sepedamotor' => $request->id_sepedamotor,
            'id_petugas' => $request->id_petugas,
            'tgl_sewa' => $request->tgl_sewa,
            'lama_sewa' => $request->lama_sewa,
            'total_biaya' => $total_biaya,
        ]);

        return redirect()->route('penyewaan.index')->with('success', 'Data penyewaan diperbarui.');
    }

    public function destroy($id) {
        $penyewaan = Penyewaan::findOrFail($id);
        $motor = $penyewaan->motor;
        $motor->update(['status' => 'Tersedia']);
        $penyewaan->delete();

        return redirect()->route('penyewaan.index')->with('success', 'Data penyewaan dihapus.');
    }
}
